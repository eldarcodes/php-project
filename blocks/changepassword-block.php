
<?php
echo '<form method="post">
                    <div class="form-group">
                        <label>Введите старый пароль</label>
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword">
                    </div>
                    <div class="form-group">
                        <label>Введите новый пароль</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword">
                    </div>
                    <div class="form-group">
                        <label>Подтвердите новый пароль</label>
                        <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword">
                    </div>

                    <div class="text-right">
                        <button id="changePassword" name=changePassword class="bg-primary text-center btn text-white">
                            Подтвердить
                        </button>
                    </div>

                </form>
                <div class="message">
                    <h6 id="errormessage" class="text-center mt-3"></h6> </div>';

                    
 ?>
