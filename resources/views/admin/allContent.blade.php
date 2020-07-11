@extends('admin.Layout.app')
@section('content')
<div class="container">
 <!-- Start Widget -->
 <div class="row">
     <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center mt-3">Content Table</h3>
                <button type="button" class="btn btn-primary"   data-toggle="modal" data-target="#preview-modal">Create New</button>
         
            </div>
             @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Type</th>
                                    <th>Section</th>
                                    <th>Condition</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($content as $row)
                                <tr>
                            <td><img src="{{$row->content_img}}" style="height: 60px; width: 60px;"></td>
                                
                                    <td>{{$row->content_title}}</td>
                                    <td>{{$row->content_body}}</td>
                                    
                                    <td>{{$row->content_type}}</td>
                                    <td>{{$row->content_section}}</td>
                                    @if ($row->content_visibility=='1')
                                    <td>
                                       Published 
                                    </td>
                                    @else
                                    <td>Unpublished</td>
                                    @endif
                                    <td>{{$row->embaded_link}}</td>
                                   <td>
                                       <a href="{{ URL::to('/DeleteContent/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                      
                                   </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  </div>
</div>


<!--- Content Add modal--->

<div class="modal fade preview-modal"  data-backdrop="" id="preview-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="preview-modalLabel">Add New Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{url('/addContent') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
          
            <input type="text" class="form-control" name="content_title" placeholder="Content title" required>
          </div>
          <div class="form-group">
            <textarea class="form-control"  name="content_body" placeholder="Content Body" required></textarea>
          </div>
          <div class="form-group">
            <select class="custom-select" name="content_type" required>
              <option selected>---select content type---</option>
              <option value="video">Video Content</option>
              <option value="image">Image Content</option>
             
            </select>
          </div>

          <div class="form-group">
            <select class="custom-select" name="content_section" required>
              <option selected>---select content section---</option>
              <option value="1">In image section</option>
              <option value="2">In video section</option>
             
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Embaded Link:</label>
            <input type="text" class="form-control" name="embaded_link" placeholder="Provide link for video content or ignore it">
          </div>

       
          <div class="form-group">
            <img id="image" src="#" />
              <label for="exampleInputPassword11">Content Image</label>
              <input type="file"  name="content_img" accept="image/*"  required onchange="readURL(this);">
          </div>

          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="content_visibility" class="custom-control-input" value="1">
            <label class="custom-control-label" for="customRadioInline1">Publish</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="content_visibility" class="custom-control-input" value="0">
            <label class="custom-control-label" for="customRadioInline2">Unpublish</label>
          </div>
         
      </div>
      <div class="modal-footer">
        <button type="button"  id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
      </div>
    </form>
    </div>
  </div>
</div>





@endsection

@section('script')


<script>

      function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
 
    </script>
@endsection

