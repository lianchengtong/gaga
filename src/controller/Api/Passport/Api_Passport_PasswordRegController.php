<?php
/**
 * Created by PhpStorm.
 * User: zhangjun
 * Date: 23/08/2018
 * Time: 2:46 PM
 */

class Api_Passport_PasswordRegController extends BaseController
{
    private $classNameForRequest = '\Zaly\Proto\Site\ApiPassportPasswordRegRequest';
    private $classNameForResponse = '\Zaly\Proto\Site\ApiPassportPasswordRegResponse';

    public function rpcRequestClassName()
    {
        return $this->classNameForRequest;
    }

    /**
     * @param \Zaly\Proto\Site\ApiPassportPasswordRegRequest $request
     * @param \Google\Protobuf\Internal\Message $transportData
     */
    public function rpc(\Google\Protobuf\Internal\Message $request, \Google\Protobuf\Internal\Message $transportData)
    {
        $tag = __CLASS__ . '-' . __FUNCTION__;
        try {
            $loginName = $request->getLoginName();
            $email     = $request->getEmail();
            $password  = $request->getPassword();
            $nickname  = $request->getNickname();
            $sitePubkPem = $request->getSitePubkPem();
            $invitationCode = $request->getInvitationCode();

            $loginName = trim($loginName);
            if(!$loginName || mb_strlen($loginName)>24 ) {
                $errorCode = $this->zalyError->errorLoginNameLength;
                $errorInfo = $this->zalyError->getErrorInfo($errorCode);
                $this->setRpcError($errorCode, $errorInfo);
                throw new Exception("loginName  is  not exists");
            }

            if(!$password) {
                $errorCode = $this->zalyError->errorPassowrdLength;
                $errorInfo = $this->zalyError->getErrorInfo($errorCode);
                $this->setRpcError($errorCode, $errorInfo);
                throw new Exception("password  is  not exists");
            }

            $nickname = trim($nickname);
            if(!$nickname || mb_strlen($nickname) > 16) {
                $errorCode = $this->zalyError->errorNicknameLength;
                $errorInfo = $this->zalyError->getErrorInfo($errorCode);
                $this->setRpcError($errorCode, $errorInfo);
                throw new Exception("nickname  is  not exists");
            }

            if(!$sitePubkPem || strlen($sitePubkPem) < 0) {
                $errorCode = $this->zalyError->errorSitePubkPem;
                $errorInfo = $this->zalyError->getErrorInfo($errorCode);
                $this->setRpcError($errorCode, $errorInfo);
                throw new Exception("sitePubkPem  is  not exists");
            }

            $loginConfig = $this->ctx->Site_Custom->getLoginAllConfig();
            $passwordResetRequiredConfig = isset($loginConfig[LoginConfig::PASSWORD_RESET_REQUIRED]) ? $loginConfig[LoginConfig::PASSWORD_RESET_REQUIRED] : "";
            $passwordResetRequired = isset($passwordResetRequiredConfig["configValue"]) ? $passwordResetRequiredConfig["configValue"] : "";
            $passwordResetWayConfig = isset($loginConfig[LoginConfig::PASSWORD_RESET_WAY]) ? $loginConfig[LoginConfig::PASSWORD_RESET_WAY] : "";
            $passwordRestWay = isset($passwordResetWayConfig["configValue"]) ? $passwordResetWayConfig["configValue"] : "email ";

            if($passwordResetRequired == 1 && mb_strlen(trim($email))<1) {
                $tip = ZalyText::getText("text.param.void", $this->language);
                $errorInfo = $passwordRestWay." " .$tip;
                $this->setRpcError("error.alert", $errorInfo);
                throw new Exception("$errorInfo  is  not exists");
            }

            $this->checkLoginName($loginName);
            $preSessionId = $this->registerUserForPassport($loginName, $email, $password, $nickname, $invitationCode, $sitePubkPem);
            $response = new \Zaly\Proto\Site\ApiPassportPasswordRegResponse();
            $response->setPreSessionId($preSessionId);
            $this->setRpcError($this->defaultErrorCode, "");
            $this->rpcReturn($transportData->getAction(), $response);
        } catch (Exception $ex) {
            $this->ctx->Wpf_Logger->error($tag, "error_msg=" . $ex->getMessage());
            $this->rpcReturn($transportData->getAction(), new $this->classNameForResponse());
        }
    }

    private function checkLoginName($loginName)
    {
        $user = $this->ctx->PassportPasswordTable->getUserByLoginName($loginName);
        if($user){
            $errorCode = $this->zalyError->errorExistLoginName;
            $errorInfo = $this->zalyError->getErrorInfo($errorCode);
            $this->setRpcError($errorCode, $errorInfo);
            throw new Exception("loginName is exists");
        }
    }

    private function registerUserForPassport($loginName, $email, $password, $nickname, $invitationCode, $sitePubkPem)
    {
       try{
           $this->ctx->BaseTable->db->beginTransaction();
           $userId   = ZalyHelper::generateStrId();
           $userInfo = [
               "userId"    => $userId,
               "loginName" => $loginName,
               "email"     => $email,
               "password"  => password_hash($password, PASSWORD_BCRYPT),
               "nickname"  => $nickname,
               "invitationCode" => $invitationCode,
               "timeReg" => ZalyHelper::getMsectime()
           ];
           $this->ctx->PassportPasswordTable->insertUserInfo($userInfo);
           $preSessionId = ZalyHelper::generateStrId();

           $preSessionInfo = [
               "userId" => $userId,
               "preSessionId" => $preSessionId,
               "sitePubkPem" => base64_encode($sitePubkPem)
           ];
           $this->ctx->PassportPasswordPreSessionTable->insertPreSessionData($preSessionInfo);

           $this->ctx->BaseTable->db->commit();
           return $preSessionId;
       }catch (Exception $ex) {
           $this->ctx->BaseTable->db->rollback();
       }
    }



}