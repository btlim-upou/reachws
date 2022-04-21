<div class="modal fade" id="addgroup-exampleModal" tabindex="-1" role="dialog" aria-labelledby="addgroup-exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content modal-header-colored shadow-lg border-0">
           
            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title text-white font-size-16" id="addgroup-exampleModalLabel">
                    Create New Room
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body p-4">
                <form>
                
                    <!-- Room Name -->
                    <div class="mb-4">
                        <label for="addgroupname-input" class="form-label">Room Name</label>
                        <input type="text" class="form-control" id="addgroupname-input" placeholder="Enter Room Name">
                    </div>

                    <!-- Room Description -->
                    <div class="mb-3">
                        <label for="addgroupdescription-input" class="form-label">Description</label>
                        <textarea class="form-control" id="addgroupdescription-input" rows="2" placeholder="Enter Description"></textarea>
                    </div>

                </form>
            </div>

            <div class="modal-footer">

                <!-- Close -->
                <button type="button" class="btn btn-link" data-bs-dismiss="modal">
                    Close
                </button>

                <!-- Create Room-->
                <button type="button" class="btn btn-primary">
                    Create Room
                </button>
            </div>
        </div>
    </div>
</div>