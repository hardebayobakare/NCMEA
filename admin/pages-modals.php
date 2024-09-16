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
    <!-- Edit Home Banner Modal  -->
    <div class="modal fade modal-add-contact" id="editBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form id="edit-banner-form" enctype="multipart/form-data">
                    <div class="modal-header px-4">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Banner</h5>
                    </div>
                    <div class="modal-body px-4">
                        <div class="row mb-2">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Banner Name" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                        <!-- ShowMessage Switch -->
                        <div class="form-group col-md-6">
                            <label for="showMessage">Show Message</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="showMessage" name="showMessage" value="1">
                                <label class="form-check-label" for="showMessage">Toggle Show Message</label>
                            </div>
                        </div>
                        <!-- Status Switch -->
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="status" name="status" value="1">
                                <label class="form-check-label" for="status">Toggle Status</label>
                            </div>
                        </div>
                    </div>
                    </div>
                    <input type="hidden" name="edit_banner" value="1">
                    <input type="hidden" name="id">
                    <div class="modal-footer px-4">
                        <button type="button" class="btn btn-secondary btn-pill cancel-btn"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary btn-pill submitedit-banner">Save Banner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>