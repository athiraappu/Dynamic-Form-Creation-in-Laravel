
@extends('layouts.app')
@section('custom-styles')
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
@endsection

@section('content')
<div class="container">
    <h2 align="center">Dynamic Form - Edit</h2> 
    <div style="text-align: right;"><a href="{{route('admin.home')}}">Back</a></div>
    <form action="{{ route('updatePost') }}" method="POST">
        @csrf
   
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
   
        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif
        <div>
            <div>Form Name</div>
            <div>
            	<input type="hidden" name="form_id" id="form_id" value="{{$data[0]->id}}">
            	<input type="text" name="form_name" id="form_name" placeholder="Enter Form Name" required="required" value="{{$data[0]->form_name}}" class="form-control" style="width: 214px;" /></div>
        </div>
        <br/>
        <table class="table table-bordered" id="dynamicTable">  
            <tr>
                <th>Label</th>
                <th>HTML Field</th>
                <th>Comments</th>
                <th>Action</th>
            </tr>
             @if($data)
               <?php $i=0;?>
                 @foreach($data as $row)     
                    <?php $i++;?>
             	 <tr>  
             	 	<td><input type="text" name="addmore[{{$i}}][label]" placeholder="Enter Label Name" class="form-control" value="{{$row->label}}" /></td> 
             	 	<td>
                    <select name="addmore[{{$i}}][caption]" class="form-control">
                        <option value="">--Select--</option>
                        <option  value="text" {{ ( $row->control == "text") ? 'selected' : '' }}>Text</option>
                        <option value="number" {{ ( $row->control == "number") ? 'selected' : '' }}>Number</option>
                        <option value="select" {{ ( $row->control == "select") ? 'selected' : '' }}>Select</option>
                    </select>
                   </td>    
                   <td><input type="text" name="addmore[{{$i}}][comments]" placeholder="Enter your comments" class="form-control" value="{{$row->comments}}"/></td>  
                   <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
           		 </tr> 
           		 
           		 @endforeach
             @endif
           
        </table> 
    
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

<script type="text/javascript">
   
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;   
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][label]" placeholder="Enter your Label" class="form-control" /></td><td> <select name="addmore['+i+'][caption]" class="form-control"><option>--Select--</option><option value="text">Text</option><option value="number">Number</option><option value="select">Select</option></select></td><td><input type="text" name="addmore['+i+'][comments]" placeholder="Enter your Comments" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>
@endsection