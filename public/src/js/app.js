$(document).ready(function(){
var car_id = 0;

//OPEN THE MODAL
 $('.open-modal').click(function(){
  //getting id from button value attrbuite
  car_id= $(this).val();
     
   //route  
  $.get('edit'+'/'+car_id , function(data){
         //placing the data into the modal
          $('#brand').val(data.Brand);
          $('#model').val(data.model);
          $('#year').val(data.production_year);
          $('#myModal').modal('show');
  });

  
  });
  
  //updating the data
   $('.update').click(function(){
    //ajax call
   $.ajax({
         method : 'POST' , 
         url : urlEdit , 
         data:{brand: $('#brand').val() , carid :car_id , model: $('#model').val(), year: $('#year').val(), _token : token}
     }).done(function(msg){
    
        $('#carBrand'+car_id).text(msg['new_brand']);
        $('#carModel'+car_id).text(msg['new_model']);
        $('#carYear'+car_id).text(msg['new_year']);
        $('#myModal').modal('hide');
        $('#myModal').find("input[type=text], input[type=number]").val("");
     });

  
  });
  
 
//Open add new modal  
 $('.add-modal').click(function(){
 
 $('#myModal').modal('show');
 });
 
 //inserting new Data
 $('.add').click(function(e){
        e.preventDefault(); 
     $.ajax({
         method : 'POST' , 
         url : urlAdd , 
         data:{
             brand : $('#brand').val(),
             model : $('#model').val(),
             year : $('#year').val(),
             _token : token
         }
     }).done(function(msg){
      //adding the data to the page dynamically 
          $("table" ).append("<tr id="+msg['new_id']+">\n\
                         <td id='carBrand"+msg['new_id']+"'>"+msg['new_brand']+"</td>\n\
                         <td id='carModel"+msg['new_id']+"'>"+msg['new_model']+"</td>\n\
                         <td id='carYear"+msg['new_id']+"'>"+msg['new_year']+"</td>\n\
                         <td><button data-toggle='modal' data-target='#myModal' class='btn btn-xs btn-primary open-modal' value="+msg['new_id']+"><i class='glyphicon glyphicon-edit'></i> Edit</button></td>\n\
                         <td><button class='btn btn-xs btn-danger delete' value="+msg['new_id']+">\n\
                         <i class='glyphicon glyphicon-trash'></i>Delete</button></td></tr>");
      });
   $('#myModal').modal('hide');      
 setTimeout(function(){// wait for 5 secs(2)
           location.reload(); // then reload the page.(3)
      }, 500);
 
     
 });
  
  //deleting data
     $('.delete').click(function(){
 car_id= $(this).val();

        var x = confirm("Are you sure you want to delete?");
   
      if(x)
        {   
       $.ajax({
         method : 'POST' , 
         url : 'delete'+'/'+car_id  , 
         data:{ _token : token}
     }).done(function(msg){
         $('#'+car_id).hide();
     });
 }
   
                
            


            
    
});

//clean the modal after closing it
  $('.close-modal').click(function(){
     
 

           $('#myModal').modal('hide');
     $('#myModal').find("input[type=text], input[type=number]").val("");
  });









});
