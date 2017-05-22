<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah pengguna</h4>
        </div>
        <div class="modal-body">
          <form class="" action="/kelola/add" method="POST">
            {{ csrf_field() }}
            <div class="row">
              <div class="form-group required">
                <label class="control-label col-sm-4" for="name">Nama</label>
                <div class="col-sm-10 ok">
                  <input type="text" class="form-control" id="text" name="name" placeholder="Ketikkan nama lengkap" required>
                </div>
              </div>
              <div class="form-group required">
                <label class="control-label col-sm-4" for="name">Username</label>
                <div class="col-sm-10 ok">
                  <input type="text" class="form-control" id="text" name="username" placeholder="Ketikkan username untuk login" required>
                </div>
              </div>
              <div class="form-group required">
                <label class="control-label col-sm-4" for="name">Email</label>
                <div class="col-sm-10 ok">
                  <input type="email" class="form-control" id="text" name="email" placeholder="contoh@gmail.com" required>
                </div>
              </div>
              <div class="form-group required">
                <label class="control-label col-sm-4" for="name">Password</label>
                <div class="col-sm-10 ok">
                  <input type="password" class="form-control" id="text" name="password" placeholder="password" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
