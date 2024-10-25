<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary"> -->
<!-- Launch demo modal -->
<!-- </button> -->



<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup for an icon Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
                <form action="partials/_handlesignup.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail">Username</label>
                            <!-- <input type="email" class="form-control" id="signupEmail" name="signupEmail"> -->
                            <input type="text" class="form-control" id="signupEmail" name="signupEmail">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Password</label>
                            <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">ConfirmPassword</label>
                            <input type="password" class="form-control" id="signupcPassword" name="signupcPassword">
                        </div>
                        <button type="submit" class="btn btn-primary">Signup</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>