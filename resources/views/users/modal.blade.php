<div class="modal fade" id="Update{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('users.update',[$user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Nama <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Email <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" class="form-control" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Password <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Password Confirmad<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" placeholder="Password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Role <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="select2 form-control" name="roles" >
                                    @foreach ($roles as $j)
                                        <option value="{{ $j->id }}"
                                            @if (old('j') == $j->id || $j->id == $user->name)
                                                selected
                                            @endif>
                                            {{ $j->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="Delete{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('users.destroy',[$user->id]) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    Apakah data ingin dihapus
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
