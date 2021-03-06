<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php if ($lang == "1") { ?>用户资料<?php } else { ?>User Profile<?php } ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="../../public/manage/config.css"/>
    <style>

        .site-user-avatar {
            width: 30px;
            height: 30px;
            margin-top: 12px;
            border-radius: 50%;
            cursor: pointer;
        }

    </style>

    <script type="text/javascript" src="../../public/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../../public/manage/native.js"></script>

    <script type="text/javascript" src="../../public/sdk/zalyjsNative.js"></script>

</head>

<body>

<!--<div class="wrapper-mask" id="wrapper-mask" style="visibility: hidden;"></div>-->

<div class="wrapper" id="wrapper">

    <!--  site basic config  -->
    <div class="layout-all-row" id="user-id" data="<?php echo $userId; ?>">

        <div class="list-item-center">

            <div class="item-row" onclick="showUserId('<?php echo $userId; ?>')">
                <div class="item-body">
                    <div class="item-body-display user-id-body">
                        <div class="item-body-desc">ID</div>

                        <div class="item-body-tail" id="user-id-value">
                            <div class="item-body-value"><?php
                                if (isset($userId)) {
                                    $subUserId = substr($userId, 0, 4) . " **** ";
                                    $subUserId .= substr($userId, -4);
                                    echo $subUserId;
                                }
                                ?></div>
                            <img class="more-img" src="../../public/img/manage/more.png"/>
                        </div>
                    </div>

                </div>
            </div>
            <div class="division-line"></div>

            <div class="item-row" id="user-nickname">
                <div class="item-body">
                    <div class="item-body-display">

                        <?php if ($lang == "1") { ?>
                            <div class="item-body-desc">用户昵称</div>
                        <?php } else { ?>
                            <div class="item-body-desc">Nickname</div>
                        <?php } ?>

                        <div class="item-body-tail" id="user-nickname-text">
                            <div class="item-body-value"><?php echo $nickname; ?></div>
                            <img class="more-img"
                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAnCAYAAAAVW4iAAAABfElEQVRIS8WXvU6EQBCAZ5YHsdTmEk3kJ1j4HDbGxMbG5N7EwkIaCy18DxtygMFopZ3vAdkxkMMsB8v+XqQi2ex8ux/D7CyC8NR1fdC27RoRszAMv8Ux23ccJhZFcQoA9wCQAMAbEd0mSbKxDTzM6wF5nq+CIHgGgONhgIi+GGPXURTlLhDstDRN8wQA5zOB3hljFy66sCzLOyJaL6zSSRdWVXVIRI9EdCaDuOgavsEJY+wFEY8WdmKlS5ZFMo6xrj9AF3EfukaAbcp61TUBdJCdn85J1yzApy4pwJeuRYAPXUqAqy4tgIsubYCtLiOAjS5jgKkuK8BW1w0APCgOo8wKMHcCzoA+AeDSGKA4AXsOEf1wzq/SNH01AtjUKG2AiZY4jj9GXYWqazDVIsZT7sBGizbAVosWwEWLEuCqZRHgQ4sU4EvLLMCnlgnAt5YRYB9aRoD/7q77kivWFlVZ2R2XdtdiyTUNqpNFxl20bBGT7ppz3t12MhctIuwXEK5/O55iCBQAAAAASUVORK5CYII="/>
                        </div>
                    </div>

                </div>
            </div>
            <div class="division-line"></div>


            <!--      part1: site name      -->
            <div class="item-row" id="user-loginName">
                <div class="item-body">
                    <div class="item-body-display">

                        <?php if ($lang == "1") { ?>
                            <div class="item-body-desc">登陆名</div>
                        <?php } else { ?>
                            <div class="item-body-desc">LoginName</div>
                        <?php } ?>


                        <div class="item-body-tail" id="user-nickname-text">
                            <div class="item-body-value"><?php echo $loginName; ?></div>
                            <img class="more-img"
                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAnCAYAAAAVW4iAAAABfElEQVRIS8WXvU6EQBCAZ5YHsdTmEk3kJ1j4HDbGxMbG5N7EwkIaCy18DxtygMFopZ3vAdkxkMMsB8v+XqQi2ex8ux/D7CyC8NR1fdC27RoRszAMv8Ux23ccJhZFcQoA9wCQAMAbEd0mSbKxDTzM6wF5nq+CIHgGgONhgIi+GGPXURTlLhDstDRN8wQA5zOB3hljFy66sCzLOyJaL6zSSRdWVXVIRI9EdCaDuOgavsEJY+wFEY8WdmKlS5ZFMo6xrj9AF3EfukaAbcp61TUBdJCdn85J1yzApy4pwJeuRYAPXUqAqy4tgIsubYCtLiOAjS5jgKkuK8BW1w0APCgOo8wKMHcCzoA+AeDSGKA4AXsOEf1wzq/SNH01AtjUKG2AiZY4jj9GXYWqazDVIsZT7sBGizbAVosWwEWLEuCqZRHgQ4sU4EvLLMCnlgnAt5YRYB9aRoD/7q77kivWFlVZ2R2XdtdiyTUNqpNFxl20bBGT7ppz3t12MhctIuwXEK5/O55iCBQAAAAASUVORK5CYII="/>
                        </div>

                    </div>

                </div>
            </div>
            <div class="division-line"></div>

            <div class="item-row">
                <div class="item-body">
                    <div class="item-body-display">

                        <?php if ($lang == "1") { ?>
                            <div class="item-body-desc">用户头像</div>
                        <?php } else { ?>
                            <div class="item-body-desc">User Avatar</div>
                        <?php } ?>


                        <div class="item-body-tail" id="user-avatar-img-id" fileId="<?php echo $avatar ?>">
                            <div class="item-body-value">
                                <img id="user-avatar-img" class="site-user-avatar"
                                     onclick="uploadFile('user-avatar-img-input')"
                                     src="/_api_file_download_/?fileId=<?php echo $avatar ?>"
                                     onerror="src='../../public/img/msg/default_user.png'">

                                <input id="user-avatar-img-input" type="file" onchange="uploadImageFile(this)"
                                       accept="image/gif,image/jpeg,image/jpg,image/png,image/svg"
                                       style="display: none;">
                            </div>
                            <img class="more-img"
                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAnCAYAAAAVW4iAAAABfElEQVRIS8WXvU6EQBCAZ5YHsdTmEk3kJ1j4HDbGxMbG5N7EwkIaCy18DxtygMFopZ3vAdkxkMMsB8v+XqQi2ex8ux/D7CyC8NR1fdC27RoRszAMv8Ux23ccJhZFcQoA9wCQAMAbEd0mSbKxDTzM6wF5nq+CIHgGgONhgIi+GGPXURTlLhDstDRN8wQA5zOB3hljFy66sCzLOyJaL6zSSRdWVXVIRI9EdCaDuOgavsEJY+wFEY8WdmKlS5ZFMo6xrj9AF3EfukaAbcp61TUBdJCdn85J1yzApy4pwJeuRYAPXUqAqy4tgIsubYCtLiOAjS5jgKkuK8BW1w0APCgOo8wKMHcCzoA+AeDSGKA4AXsOEf1wzq/SNH01AtjUKG2AiZY4jj9GXYWqazDVIsZT7sBGizbAVosWwEWLEuCqZRHgQ4sU4EvLLMCnlgnAt5YRYB9aRoD/7q77kivWFlVZ2R2XdtdiyTUNqpNFxl20bBGT7ppz3t12MhctIuwXEK5/O55iCBQAAAAASUVORK5CYII="/>
                        </div>
                    </div>

                </div>
            </div>
            <div class="division-line"></div>

        </div>

    </div>


    <!-- part 2  register && login plugin-->
    <div class="layout-all-row">

        <div class="list-item-center">

            <?php if (!$isSiteOwner) { ?>

                <div class="item-row">
                    <div class="item-body">
                        <div class="item-body-display">
                            <?php if ($lang == "1") { ?>
                                <div class="item-body-desc">设为站点管理员</div>
                            <?php } else { ?>
                                <div class="item-body-desc">Add Site Manager</div>
                            <?php } ?>


                            <div class="item-body-tail">
                                <?php if ($isSiteManager == 1) { ?>
                                    <input id="addSiteManagerSwitch" class="weui_switch" type="checkbox" checked>
                                <?php } else { ?>
                                    <input id="addSiteManagerSwitch" class="weui_switch" type="checkbox">
                                <?php } ?>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="division-line"></div>
            <?php } ?>

            <div class="item-row">
                <div class="item-body">
                    <div class="item-body-display">
                        <?php if ($lang == "1") { ?>
                            <div class="item-body-desc">设为站点默认好友</div>
                        <?php } else { ?>
                            <div class="item-body-desc">Add Site Default Friend</div>
                        <?php } ?>

                        <div class="item-body-tail">
                            <?php if ($isDefaultFriend == 1) { ?>
                                <input id="addDefaultFriendSwitch" class="weui_switch" type="checkbox" checked>
                            <?php } else { ?>
                                <input id="addDefaultFriendSwitch" class="weui_switch" type="checkbox">
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="division-line"></div>

        </div>

    </div>


    <!--   part 3  -->
    <div class="layout-all-row">

        <div class="list-item-center">
            <div class="item-row" id="user-group-list">
                <div class="item-body">
                    <div class="item-body-display">

                        <?php if ($lang == "1") { ?>
                            <div class="item-body-desc">用户群组列表</div>
                        <?php } else { ?>
                            <div class="item-body-desc">User Group List</div>
                        <?php } ?>

                        <div class="item-body-tail">
                            <img class="more-img"
                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAnCAYAAAAVW4iAAAABfElEQVRIS8WXvU6EQBCAZ5YHsdTmEk3kJ1j4HDbGxMbG5N7EwkIaCy18DxtygMFopZ3vAdkxkMMsB8v+XqQi2ex8ux/D7CyC8NR1fdC27RoRszAMv8Ux23ccJhZFcQoA9wCQAMAbEd0mSbKxDTzM6wF5nq+CIHgGgONhgIi+GGPXURTlLhDstDRN8wQA5zOB3hljFy66sCzLOyJaL6zSSRdWVXVIRI9EdCaDuOgavsEJY+wFEY8WdmKlS5ZFMo6xrj9AF3EfukaAbcp61TUBdJCdn85J1yzApy4pwJeuRYAPXUqAqy4tgIsubYCtLiOAjS5jgKkuK8BW1w0APCgOo8wKMHcCzoA+AeDSGKA4AXsOEf1wzq/SNH01AtjUKG2AiZY4jj9GXYWqazDVIsZT7sBGizbAVosWwEWLEuCqZRHgQ4sU4EvLLMCnlgnAt5YRYB9aRoD/7q77kivWFlVZ2R2XdtdiyTUNqpNFxl20bBGT7ppz3t12MhctIuwXEK5/O55iCBQAAAAASUVORK5CYII="/>
                        </div>
                    </div>

                </div>
            </div>
            <div class="division-line"></div>
        </div>
    </div>


    <!--   part 4  -->
    <!--    <div class="layout-all-row">-->
    <!---->
    <!--        <div class="list-item-center">-->
    <!--            <div class="item-row" id="remove-user">-->
    <!--                <div class="item-body">-->
    <!--                    <div class="item-body-display">-->
    <!---->
    <!--                        --><?php //if ($lang == "1") { ?>
    <!--                            <div class="item-body-desc">删除用户账号</div>-->
    <!--                        --><?php //} else { ?>
    <!--                            <div class="item-body-desc">Remove User Account</div>-->
    <!--                        --><?php //} ?>
    <!---->
    <!--                        <div class="item-body-tail">-->
    <!--                            <img class="more-img"-->
    <!--                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAnCAYAAAAVW4iAAAABfElEQVRIS8WXvU6EQBCAZ5YHsdTmEk3kJ1j4HDbGxMbG5N7EwkIaCy18DxtygMFopZ3vAdkxkMMsB8v+XqQi2ex8ux/D7CyC8NR1fdC27RoRszAMv8Ux23ccJhZFcQoA9wCQAMAbEd0mSbKxDTzM6wF5nq+CIHgGgONhgIi+GGPXURTlLhDstDRN8wQA5zOB3hljFy66sCzLOyJaL6zSSRdWVXVIRI9EdCaDuOgavsEJY+wFEY8WdmKlS5ZFMo6xrj9AF3EfukaAbcp61TUBdJCdn85J1yzApy4pwJeuRYAPXUqAqy4tgIsubYCtLiOAjS5jgKkuK8BW1w0APCgOo8wKMHcCzoA+AeDSGKA4AXsOEf1wzq/SNH01AtjUKG2AiZY4jj9GXYWqazDVIsZT7sBGizbAVosWwEWLEuCqZRHgQ4sU4EvLLMCnlgnAt5YRYB9aRoD/7q77kivWFlVZ2R2XdtdiyTUNqpNFxl20bBGT7ppz3t12MhctIuwXEK5/O55iCBQAAAAASUVORK5CYII="/>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!---->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="division-line"></div>-->
    <!---->
    <!--            <div class="item-bottom">-->
    <!---->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

</div>

<div class="wrapper-mask" id="wrapper-mask" style="visibility: hidden;"></div>

<div class="popup-template" style="display:none;">

    <div class="config-hidden" id="popup-group">

        <div class="flex-container">
            <div class="header_tip_font popup-group-title">创建群组</div>
        </div>

        <div class="" style="text-align: center">
            <input type="text" class="popup-group-input"
                   data-local-placeholder="enterGroupNamePlaceholder" placeholder="please input">
        </div>

        <div class="line"></div>

        <div class="" style="text-align:center;">
            <?php if ($lang == "1") { ?>
                <button id="update-user-button" type="button" class="create_button" data=""
                        onclick="updateConfirm();"> 修改
                </button>
            <?php } else { ?>
                <button id="update-user-button" type="button" class="create_button" data=""
                        onclick="updateConfirm();">Update
                </button>
            <?php } ?>
        </div>

    </div>

</div>


<script type="text/javascript">

    function uploadFile(obj) {

        if (isAndroid()) {
            zalyjsImageUpload(uploadAvatarImageResult);
        } else {
            $("#" + obj).val("");
            $("#" + obj).click();
        }
    }


    function uploadAvatarImageResult(result) {

        var fileId = result.fileId;

        //update server image
        updateServerImage(fileId);

        var newSrc = "/_api_file_download_/?fileId=" + fileId;

        $(".site-user-avatar").attr("src", newSrc);
    }

    function uploadImageFile(obj) {
        if (obj) {
            if (obj.files) {
                var formData = new FormData();

                formData.append("file", obj.files.item(0));
                formData.append("fileType", "FileImage");
                formData.append("isMessageAttachment", false);

                var src = window.URL.createObjectURL(obj.files.item(0));

                uploadFileToServer(formData, src);

                //直接放图片
                $("#user-avatar-img").attr("src", src);
            }
            return obj.value;
        }

    }

    function uploadFileToServer(formData, src) {
        var url = "./index.php?action=http.file.uploadWeb";

        if (isMobile()) {
            url = "/_api_file_upload_/?fileType=1";  //fileType=1,表示文件
        }

        $.ajax({
            url: url,
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function (imageFileIdResult) {
                if (imageFileIdResult) {
                    var fileId = imageFileIdResult;
                    if (isMobile()) {
                        var res = JSON.parse(imageFileIdResult);
                        fileId = res.fileId;
                    }
                    updateServerImage(fileId);
                } else {
                    alert(getLanguage() == 1 ? "上传返回结果空 " : "empty response");
                }
            },
            error: function (err) {
                alert("update image error");
                // return false;
            }
        });
    }

    function updateServerImage(fileId) {
        var userId = $("#user-id").attr("data");
        var url = "index.php?action=manage.user.update&lang=" + getLanguage();

        var data = {
            'userId': userId,
            'key': 'avatar',
            'value': fileId,
        };
        zalyjsCommonAjaxPostJson(url, data, updateAvatarResponse);
    }

    function updateAvatarResponse(url, data, result) {
        var res = JSON.parse(result);
        if (res.errCode != "success") {
            return getLanguage() == 1 ? "更新头像失败" : "update user avatar fail";
        }
    }

</script>


<script type="text/javascript">

    function showWindow(jqElement) {
        jqElement.css("visibility", "visible");
        $(".wrapper-mask").css("visibility", "visible").append(jqElement);
    }


    function removeWindow(jqElement) {
        jqElement.remove();
        $(".popup-template").append(jqElement);
        $(".wrapper-mask").css("visibility", "hidden");
        $("#update-user-button").attr("data", "");
        $(".popup-group-input").val("");
        $(".popup-template").hide();
    }


    // $(document).mouseup(function (e) {
    $(".wrapper-mask").mouseup(function (e) {
        var targetId = e.target.id;
        var targetClassName = e.target.className;

        if (targetId == "wrapper-mask") {
            var wrapperMask = document.getElementById("wrapper-mask");
            var length = wrapperMask.children.length;
            var i;
            for (i = 0; i < length; i++) {
                var node = wrapperMask.children[i];
                node.remove();
                // addTemplate(node);
                $(".popup-template").append(node);
                $(".popup-template").hide();
            }
            $("#update-user-button").attr("data", "");
            wrapperMask.style.visibility = "hidden";
        }
    });


    function showUserId(userId) {
        var url = "index.php?action=manage.user.id&userId=" + userId + "&lang=" + getLanguage();
        zalyjsCommonOpenPage(url);
    }


    $("#user-nickname").click(function () {
        var title = $(this).find(".item-body-desc").html();
        var inputBody = $(this).find(".item-body-value").html();

        $("#update-user-button").attr("data", "nickname");
        showWindow($(".config-hidden"));

        $(".popup-group-title").html(title);
        $(".popup-group-input").val(inputBody);

    });

    $("#user-loginName").click(function () {
        var title = $(this).find(".item-body-desc").html();
        var inputBody = $(this).find(".item-body-value").html();

        $("#update-user-button").attr("data", "loginName");
        showWindow($(".config-hidden"));

        $(".popup-group-title").html(title);
        $(".popup-group-input").val(inputBody);
    });


    function updateConfirm() {
        var userId = $("#user-id").attr("data");
        var value = $(".popup-group-input").val();
        var nameData = $("#update-user-button").attr("data");

        if (nameData == null || nameData == "") {
            alert("update fail");
            return;
        }

        var data = {
            'userId': userId,
            'key': nameData,
            'value': value
        };

        var url = "index.php?action=manage.user.update&lang=" + getLanguage();

        zalyjsCommonAjaxPostJson(url, data, updateNameResponse);

        removeWindow($(".config-hidden"));
    }

    function updateNameResponse(url, data, result) {
        var res = JSON.parse(result);

        if (res.errCode != "success") {
            alert(getLanguage() == 1 ? "更新成功" : "update name error");
        }

        location.reload();
    }

    //enable realName
    $("#addSiteManagerSwitch").change(function () {

        var userId = $("#user-id").attr("data");
        var isChecked = $(this).is(':checked')
        var url = "index.php?action=manage.user.update&lang=" + getLanguage();


        var data = {
            'userId': userId,
            'key': 'addSiteManager',
            'value': isChecked ? 1 : 0,
        };

        zalyjsCommonAjaxPostJson(url, data, addManagerResponse);

    });

    function addManagerResponse(url, data, result) {
        var res = JSON.parse(result);

        if (res.errCode != "success") {
            alert(getLanguage() == 1 ? "更新成功" : "update error");
        }
    }


    $("#addDefaultFriendSwitch").change(function () {

        var userId = $("#user-id").attr("data");
        var isChecked = $(this).is(':checked')

        var url = "index.php?action=manage.user.update&lang=" + getLanguage();

        var data = {
            'userId': userId,
            'key': 'addDefaultFriend',
            'value': isChecked ? 1 : 0,
        };

        zalyjsCommonAjaxPostJson(url, data, addDefaultFriendResponse);
    });

    function addDefaultFriendResponse(url, data, result) {
        var res = JSON.parse(result);

        if (res.errCode != "success") {
            alert(getLanguage() == 1 ? "更新成功" : "update error");
        }
    }


    $("#user-group-list").click(function () {
        var userId = $("#user-id").attr("data");

        var url = "index.php?action=manage.user.groups&userId=" + userId + "&lang=" + getLanguage();

        zalyjsCommonOpenPage(url);
    });


    $("#remove-user").click(function () {
        var userId = $("#user-id").attr("data");

        var url = "index.php?action=manage.user.delete&lang=" + getLanguage();

        var data = {
            'userId': userId
        };

        zalyjsCommonAjaxPostJson(url, data, removeUserResponse);
    });

    function removeUserResponse(url, data, result) {
        var res = JSON.parse(result);

        if (res.errCode == "success") {
            var url = "index.php?action=manage.user&lang=" + getLanguage();
            location.href = url;
        } else {
            alert(getLanguage() == 1 ? "删除用户失败" : "update error");
        }

    }


</script>


</body>
</html>




