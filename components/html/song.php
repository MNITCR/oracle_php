<div class="container">
    <div class="">
        <div class="">
            <h3 class="text-center">Top Song</h3>
            <div class="d-flex justify-content-end">
                <div class="bg-success rounded ps-3 pe-3 text-white py-2" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#coverAlbum">
                    <span>Add</span>
                    <i class="ri-add-circle-line"></i>
                </div>
            </div>
        </div>
        <!-- <div class="d-flex flex-wrap gap-3">
            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div> -->
        <div class="d-flex flex-wrap gap-3">
            <?php
                // Query to select all data from cover_tbl
                $sql = oci_parse($conn,"SELECT * FROM cover_tbl");
                oci_execute($sql);
                $currentDirectory = __DIR__;

                // Loop through the results and generate HTML
                while ($row = oci_fetch_assoc($sql)) {
                    $imagePath = $currentDirectory . '../' . $row['COVER_IMAGE'];
                    ?>
                        <div class="card" style="width: 18rem;">
                            <img src="../asset/uploads/<?php echo basename($row['COVER_IMAGE']); ?>" class="card-img-top" alt="Cover Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['ARTIST_NAME']; ?></h5>
                                <p class="card-text"><?php echo $row['DS']; ?></p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    <?php
                }

                // Close the connection
                oci_close($conn);
            ?>
        </div>
    </div>
</div>

<style>
    #show-image-select-cv{
        transition: background 0.5s ease;
    }
    #show-image-select-cv:hover{
        background: #F5F7F8;
        cursor: pointer;
    }
</style>

<!-- Add Cv -->
<div class="modal fade" id="coverAlbum" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../components/php/addCover.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="d-flex row g-3 flex-wrap">
                <div class="col-12 col-sm-6 ">
                    <div class="d-none">
                        <input type="file" name="cover_image" id="cover_image">
                    </div>
                    <div class="card col-12 col-xs-12 col-sm-12" id="show-image-select-cv" style="height: 300px;">
                        <div class="m-auto text-center">
                            <div class="fs-2">
                                <i class="ri-file-add-line"></i>
                            </div>
                            <div class="">
                                <h6>Upload Image</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xs-6 col-sm-6">
                    <div class="">
                        <h5 class="text-center">About Cover Song</h5>
                    </div>
                    <div class="">
                        <div class="mb-3">
                            <label for="artist_name" class="form-label">Artist Name</label>
                            <input type="text" class="form-control" name="artist_name" id="artist_name">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Type of Song</label>
                            <select class="form-select" name="type_of_song" id="type_of_song" aria-label="Default select example">
                                <option value="Hip Hop">Hip Hop</option>
                                <option value="Sad">Sad</option>
                                <option value="Remix">Remix</option>
                                <option value="Acoustic Cover">Acoustic Cover</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" cols="" rows="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="save_cv">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex">
            <div class="col-6 col-xs-12 col-sm-col-12">
                <div class="">
                    <div class="">
                        <img class="rounded" style="height: 300px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6gLVHCAVNDu_OKNRqNy2W2vTRJlj38GqAAcfOeKW66FGUYsKa" alt="">
                    </div>
                    <div class="">

                    </div>
                </div>
            </div>
            <div class="col-6 col-xs-12 col-sm-col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h5 class="text-center">Album Song</h5>
                    </div>
                    <div class=" rounded pe-2 ps-2 py-1 text-success fs-5" style="cursor: pointer;">
                        <i class="ri-add-circle-line"></i>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>


