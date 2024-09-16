<?php
    // include "session.php";
    // include "header.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<body">
    <!-- Add Home Banner Modal  -->
    <div class="modal fade modal-add-contact" id="addHomeBanners" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form id="add-banner-form" enctype="multipart/form-data">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add New Banner</h5>
                </div>
                <div class="modal-body px-4">
                    <div class="row mb-2">
                        <div class="form-group">
                            <label for="image">Select an Image<small>(format: (jpg, jpeg, png))</small>:</label>
                            <input type="file" class="form-control" id="image" name="banner_image">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="add_homebanner" value="1">
                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill cancel-btn"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-pill add-banner">Save New Banner</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>


</html>