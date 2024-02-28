<div class="modal fade" id="change-profile-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="settings-modal-title"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="change-email-form" class="d-none">
            <div class=" form-floating mb-3 ms-2 opacity-50">
              <span><span class="me-1">Email: </span><?php echo $_SESSION['user_email']; ?></span>
            </div>

            <div class="form-floating mb-3" id="newEmailBody">
            <input type="email" class="form-control" id="newEmail" placeholder="name@example.com">
            <label for="floatingInput">New Email address</label>
            <div class="invalid-feedback">
              Invalid Email!
            </div>
            </div>

            <div class="form-floating mb-3" id="newEmailEnterPassBody">
            <input type="password" class="form-control" id="newEmailEnterPass" placeholder="Password">
            <label for="floatingPassword">To verify it's you please re eneter your password.</label>
            <div class="invalid-feedback">
              Invalid Password!
            </div>
            </div>

            <div class="form-floating d-none" id ="send_otp_email_loading" >
              <button type="button" class="btn btn-outline-dark">
              <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Verifying...
              </button>
            </div>

            <div class="form-floating" id="newEmail-verify-password" >
              <button type="button" onclick="change_email_password_verification()" class="btn btn-outline-dark">Verify Password</button>
            </div>

            <div class="form-floating mb-3 d-none" id="newEmailVerifyBody">
            <input type="Text" class="form-control" id="newEmailVerify" placeholder="name@example.com" maxlength="6">
            <label for="floatingInput">Please enter the verification code that was sent to your new email.</label>
            <div class="invalid-feedback">
              Invalid Input!
            </div>
            </div>

            <div class="form-floating d-none" id="change_email_now_btn">
              <button type="button" onclick="return_change_email()"  class="btn btn-outline-dark me-2">Return</button>
              <button type="button" id="change_email_now" class="btn btn-outline-dark">Change Email</button>
            </div>
        </form>

        <form id="change-password-form" class="d-none">

           <div class="form-floating changePassNotVerified mb-3" id="newPassEnterOldPassBody">
              <input type="password" class="form-control" id="newPassEnterOldPass" placeholder="Password">
              <label for="floatingPassword">To verify it's you please re eneter your old password.</label>
              <div class="invalid-feedback">
                Invalid Password!
              </div>
            </div>

            <div class="form-floating changePassNotVerified" id="newPassEnterOldPassBtnBody" >
              <button type="button" onclick="change_password_verification();" class="btn btn-outline-dark">Verify Password</button>
            </div>

            <div class="form-floating changePassVerified mb-3 d-none" id="newPassEnterNewPassBody">
              <input type="password" class="form-control" id="newPassEnterNewPass" placeholder="Password">
              <label for="floatingPassword">New Password</label>
              <div class="invalid-feedback">
                Invalid Password!
              </div>
            </div>

            <div class="form-floating changePassVerified mb-3 d-none" id="newPassReEnterNewPassBody">
              <input type="password" class="form-control" id="newPassReEnterNewPass" placeholder="Password">
              <label for="floatingPassword">Repeat-password</label>
              <div class="invalid-feedback" id="newPassReEnterNewPass_feedback">
                Invalid Repeat-password!
              </div>
            </div>

            <div class="form-floating changePassVerified d-none" id="newPassbtn" >
              <button type="button" onclick="change_password_now()" class="btn btn-outline-dark">Change Password</button>
            </div>

        </form>

        <form id="change-adminDtails-form" class="d-none">

           <div class="form-floating changeAdminDtailsNotVerified mb-3">
              <input type="password" class="form-control" id="newDetailsEnterOldPass" placeholder="Password">
              <label for="floatingPassword">To verify it's you please re eneter your old password.</label>
              <div class="invalid-feedback">
                Invalid Password!
              </div>
            </div>

            <div class="form-floating changeAdminDtailsNotVerified"  >
              <button type="button" onclick="change_adminDetails_verification();" class="btn btn-outline-dark">Verify Password</button>
            </div>

            <div class="form-floating mb-3 changeAdminDtailsVerified d-none">
              <input type="text" class="form-control" id="fname" placeholder="" value="<?php echo $_SESSION['first_name'];?>"  maxlength="50">
              <label for="floatingInput">First Name: </label>
              <div class="invalid-feedback">
                Invalid First Name!
              </div>
            </div>

            <div class="form-floating mb-3 changeAdminDtailsVerified d-none">
              <input type="text" class="form-control" id="mname" placeholder="" value="<?php echo $_SESSION['middle_name'];?>"  maxlength="50">
              <label for="floatingInput">Middle Name: </label>
              <div class="invalid-feedback">
                Invalid Middle Name!
              </div>
            </div>

            <div class="form-floating mb-3 changeAdminDtailsVerified d-none">
              <input type="text" class="form-control" id="lname" placeholder="" value="<?php echo $_SESSION['last_name'];?>"  maxlength="50">
              <label for="floatingInput">Last Name: </label>
              <div class="invalid-feedback">
                Invalid Last Name!
              </div>
            </div>

            <div class="form-floating mb-3 changeAdminDtailsVerified d-none">
              <input type="text" class="form-control" id="occupation" placeholder="" value="<?php echo $_SESSION['occupation'];?>"  maxlength="50">
              <label for="floatingInput">Occupation: </label>
              <div class="invalid-feedback">
                Invalid Occupation!
              </div>
            </div>

            <div class="form-floating changeAdminDtailsVerified d-none"  >
              <button type="button" onclick="change_adminDetails_now();" class="btn btn-outline-dark">Change Admin Details</button>
            </div>

        </form>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>