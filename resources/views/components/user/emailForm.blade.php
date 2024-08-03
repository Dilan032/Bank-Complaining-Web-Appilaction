
    <div class="row">
        <div class="col-md-8">
            <section  class="bg-white text-dark  rounded p-3">
            <h3 class="mb-3 text-center">Send the message</h3>

            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Subject">
                    <label for="floatingInput">Subject</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Message" id="floatingTextarea2" style="height: 200px"></textarea>
                    <label for="floatingTextarea2">Message</label>
                </div>
            </div>
            <div class="col-md-4">
            <br>
            <br>
                <div class="text-center mb-3 mt-4">
                    <h3>Upload Images</h3>
                    <span class="font-monospace"><small>(Upload pictures where there are problems)</small></span>
                </div>

                <div class="d-flex justify-content-around">
                    <div class="bg-white border rounded p-2">
                        <label for="file_1">
                            <i class="bi bi-upload fs-1"></i>
                        </label>
                        <input type="file" class="d-none" name="img_1" id="file_1">
                    </div>
                    <div class="bg-white border rounded p-2">
                        <label for="file_2">
                            <i class="bi bi-upload fs-1"></i>
                        </label>
                        <input type="file" class="d-none" name="img_2" id="file_2">
                    </div>
                    <div class="bg-white border rounded p-2">
                        <label for="file_3">
                            <i class="bi bi-upload fs-1"></i>
                        </label>
                        <input type="file" class="d-none" name="img_3" id="file_3">
                    </div>
                    <div class="bg-white border rounded p-2">
                        <label for="file_4">
                            <i class="bi bi-upload fs-1"></i>
                        </label>
                        <input type="file" class="d-none" name="img_4" id="file_4">
                    </div>
                    <div class="bg-white border rounded p-2">
                        <label for="file_5">
                            <i class="bi bi-upload fs-1"></i>
                        </label>
                        <input type="file" class="d-none" name="img_5" id="file_5">
                    </div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto mt-4">
                    <button class="btn btn-primary" type="submit">Send Message</button>
                </div>
            </form>
        </section>

        </div>
    </div>
