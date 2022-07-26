<div class="modal fade" id="Update{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Modul Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('members.update',[$member->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Modul Group <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="select2 form-control" name="group_id" >
                                    @foreach ($group as $j)
                                        <option value="{{ $j->id }}"
                                            @if (old('j') == $j->id || $j->id == $member->name)
                                            selected
                                        @endif>
                                            {{ $j->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Nama <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Nama" class="form-control" value="{{ $member->name }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Alamat <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="address" placeholder="Alamat" class="form-control" value="{{ $member->address }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>HP <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="number" name="phone" placeholder="HP" class="form-control" value="{{ $member->phone }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Email <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" class="form-control" value="{{ $member->email }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Profile <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <textarea cols="5" type="text" name="profile" placeholder="Profile" class="form-control">{{ $member->profile }}</textarea>
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

<div class="modal fade text-left" id="Delete{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('members.destroy',[$member->id]) }}" method="POST">
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
