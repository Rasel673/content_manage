@extends('admin.Layout.app')
@section('content')
<div  id="mainDiv" class="container">
    <div class="row">
    <div class="col-md-12 p-5">
      <button id="addModalId" class="btn btn-sm btn-success my-3"><strong>Create New</strong></button>
    <table id="contentDataTable" class="table table-striped table-sm table-bordered text-center" cellspacing="0" width="100%">
      <thead>
        <tr>
            <th class="th-sm">Image</th>
            <th class="th-sm">Title</th>
            <th class="th-sm">Body</th>
            <th class="th-sm">Section</th>
            <th class="th-sm">Content_Type</th>
            <th class="th-sm">Visibility</th>
            <th class="th-sm">Delete</th>
        </tr>
      </thead>
      <tbody id="content">
      
       
      
      
      </tbody>
    </table>
    
    </div>
    </div>
    </div> 
</div>
   
<div id="loading" class="container">
  <div class="row">
  <div class="col-md-12 p-5 text-center">
  
  <img src="{{asset('images/loader.gif')}}"/>
  </div>
  </div>
  </div> 

  <div id="wrongDiv" class="container d-none">
    <div class="row">
    <div class="col-md-12 p-5">
   <h3 class="alert-danger danger">Something Went Wrong!!!</h3>
    </div>
    </div>
    </div> 


        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
        
            <div class="modal-body mt-5">
              <h5 id="Did" class="text-center d-none"></h5> 
              <h5 class="text-center">Do you want to delete??</h5>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
              <button type="button" id="dltid" data-id="" class="btn btn-sm btn-primary">Yes</button>
            </div>
          </div>
        </div>
        </div>
       
       <!-- ADD Modal -->
       <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
        
           <div class="modal-body mt-5 text-center">
             <h5  class="text-center mb-4">Add Content</h5> 
             
             <input type="text" id=" ContentAddtitleId" class="form-control mb-3" placeholder=" Content name"/>
             <input type="text" id=" ContentAddbodyId" class="form-control mb-3" placeholder=" Content description"/>
             <input type="text" id=" ContentAddtypeId" class="form-control mb-3" placeholder=" Content Fee"/>
             <input type="text" id=" ContentAddsectionId" class="form-control mb-3" placeholder=" Content Total Enroll"/>
             <input type="text" id=" ContentAddvisibilityId" class="form-control mb-3" placeholder=" Content Class"/>
             <input type="text" id=" ContentAddlinkId" class="form-control mb-3" placeholder=" Content link"/>
             <input type="text" id=" ContentAddImgId" class="form-control mb-3" placeholder=" Content image"/>
            
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cencel</button>
             <button type="button" id="addid" data-id="" class="btn btn-sm btn-primary">Save</button>
           </div>
         </div>
       </div>
       </div>
       @endsection
       @section('script')
<script type="text/javascript">
getContent();
function getContent() {
    axios.get('/getContent')
        .then(function(response) {

            if (response.status == 200) {
                $('#mainDiv').removeClass('d-none');
                $('#loading').addClass('d-none');
                $('#contentDataTable').DataTable().destroy();
                $('#content').empty();
                var jsonData = response.data;

                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td ><img class='table-img' src=" + jsonData[i].content_img + "></td>" +
                        "<td>" + jsonData[i].content_title + "</td>" +
                        "<td>" + jsonData[i].content_body + "</td>" +
                        "<td>" + jsonData[i].content_section + "</td>" +
                        "<td>" + jsonData[i].content_type+ "</td>" +
                        "<td>" + jsonData[i].content_visibility + "</td>" +
                        "<td><a  class='delete' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a> </td>"

                    ).appendTo('#content')
                });
                
             $('.delete').click(function() {
                    var id = $(this).data('id');

                    $('#deleteModal').modal('show');
                    $('#Did').html(id);
                })
            

                 
              


                $('#contentDataTable').DataTable();
    $('.dataTables_length').addClass('bs-select');
               
                
            } else {

                $('#wrongDiv').removeClass('d-none');
                $('#loading').addClass('d-none');


            }

        })
        .catch(function(error) {

            $('#wrongDiv').removeClass('d-none');
            $('#loading').addClass('d-none');

        });



}

///delete modal yes button---------
$('#dltid').click(function() {
    var id = $('#Did').html();
    deleteContent(id);
})
//delete  Content by id--------------------
function deleteContent(dleteid) {
$('#dltid').html("<div class='spinner-border text-light' role='status'></div>");
    axios.post('/DeleteContent', {
            id:dleteid
           
        })
         
        .then(function(response) {
           
          if(response.data==1){
            $('#dltid').html("Yes");
            $('#deleteModal').modal('hide');
            toastr.success('Delete Success');
            getContent();
          }else{
            $('#deleteModal').modal('hide');
            toastr.error('Delete failed');
            getContent();
          }
        })
          .catch(function(error) {

            $('#deleteModal').modal('hide');
            toastr.error('Something went wrong!!!!');
            getContent();
        });

    }

///show add  modal 

$('#addModalId').click(function(){
    $('#addModal').modal('show');
})
///add modal save button---------
$('#addid').click(function() {
   
    var contentTitle=$('#ContentAddtitleId').val();
    var contentBody=$('#ContentAddbodyId').val();
    var contentType=$('#ContentAddtypeId').val();
    var contentSection=$('#ContentAddsectionId').val();
    var contentVisibility=$('#ContentAddvisibilityId').val();
    var contentLink=$('#ContentAddlinkId').val();
    var contentImg=$('#ContentAddImgId').val();

    addContent(contentTitle,contentBody,contentType,contentSection,contentVisibility,contentLink,contentImg);
})

   ////ADD service --------------------
      function addContent( contentTitle,contentBody,contentType,contentSection,contentVisibility,contentLink,contentImg){

        if( contentTitle.length==0){
            
            toastr.error(' Content title can not be Empty!! or smae!!');
        }else if( contentBody.length==0){
            
            toastr.error(' Content Description can not be Empty!!');
        }else if( contentType.length==0){
            toastr.error(' Content Image can not be Empty!!');
        }else{

            $('#addid').html("<div class='spinner-border text-light' role='status'></div>");  

            axios.post('/addContent', {
            Content_title: contentTitle,
             content_body:contentBody,
             content_type:contentType,
             content_section:contentSection,
             content_visibility:contentVisibility,
             embaded_link:contentLink,
             content_img: contentImg,
    
            })
            .then(function(response) {
                if(response.status==200){
                    $('#addid').html("Save");  
                    if(response.data==1){
                        $('#addModal').modal('hide');
                        toastr.success('Save  Content successfully!!!');
                         getContent();
        
                    }else{
                        $('#addModal').modal('hide');
                        toastr.error('Add  Content failed');
                         getContent();
                    }
        
                }else{

                    $('#addModal').modal('hide');
                        toastr.error('something went wrong!!!');
                         getContent();
                }
                
            })
            .catch(function(error) {
                $('#addModal').modal('hide');
                    toastr.error('something went wrong!!!');
                     getContent();
               
            });
        }

       
      
    }

 
</script>
@endsection