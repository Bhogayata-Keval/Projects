 $(document).ready(function(){

  
 


 //$(document).on('click', '#showmycart', function(){
    
//});

  
  


  $('.calculate1').keyup(function(){
    var get1=$(this).attr('id');
    var abc='#price'+get1;
    var x=$('#price'+get1).html();
    var y=$('#'+get1).val();
    var z=x*y;
    $('#totalamt'+get1).text(z);
  });

   

$(document).on('click', '#usercontact', function(){
  var aname=$(this).attr('name');
  $('#userprofile').attr('class','btn btn-default col-md-12');
  $('#usercontact').attr('class','btn btn-primary col-md-12');
  jQuery.ajax({
    url: 'userinfo2.php',
    type: 'POST',
    data: { uname:aname },
    success: function(data){
      $('#infodiv').html(data);
    }
  });
});

$(document).on('click', '#userprofile', function(){
  var aname=$(this).attr('name');
 $('#userprofile').attr('class','btn btn-primary col-md-12');
 $('#usercontact').attr('class','btn btn-default col-md-12');
  jQuery.ajax({
    url: 'userinfo2.php',
    type: 'POST',
    data: { zname:aname },
    success: function(data){
      $('#infodiv').html(data);
    }
  });
});


$(document).on('click', '#updatecon', function(){
  var editname=$(this).attr('name');

  var amobile=$('#iumobile').val();
  var aaddress=$('#iuaddress').val();
  jQuery.ajax({
    url: 'updateuserinfo.php',
    type: 'POST',
    data: {
     changename:editname,
     mobile:amobile,
     address:aaddress
    },
    success: function(data){
    
    }
  });
});


$(document).on('click', '#updatepro', function(){
  var editname1=$(this).attr('name');

  var afname=$('#ifname').val();
  var alname=$('#ilname').val();
  var aemail=$('#iemail').val();
  var apass=$('#ipass').val();

  jQuery.ajax({
    url: 'updateuserinfo.php',
    type: 'POST',
    data: {
     changename1:editname1,
      fname:afname,
      lname:alname,
      email:aemail,
      pass:apass
    },
    success: function(data){
  
    }
  });
});


 $(document).on('click', '.mcart', function(e){
  e.preventDefault();

  var pid=$(this).attr('id');
  
  //$.session.set('id1',pid);
  $('#'+pid).attr('class','mcart col-md-6 btn btn-danger');
  $('#'+pid).text('Added to Cart');
  jQuery.ajax({
    url: 'cart/mycart.php',
    type: 'POST',
    data: { goid:pid },
    success: function(data){

   

    }
  });
 });

 

 $(document).on('change', '.ifilter', function(e){
    $('.ifilter:checked').each(function(){
      var catch1=$(this).val();
      jQuery.ajax({
        url: 'checkbox1.php',
        type: 'POST',
        data: {catch2:catch1},
        success: function(data){
          $('#filterresult1').html(data);
        }
      });
    });
  });

$(document).on('change', '#iall', function(e){
      e.preventDefault();
      var catch3='SET';
     jQuery.ajax({
        url: 'checkbox1.php',
        type: 'POST',
        data: {catch4:catch3},
        success: function(data){
          $('#filterresult1').html(data);
        }
      });

});
  $(document).on('click', '#admin_user', function(e){
    e.preventDefault();
    var x='set';
    var tab=$('#fortable');
    var tab2=$('#fortable2');
    $(this).attr('class','btn btn-primary col-md-12');
    $('#admin_product').attr('class','btn btn-default col-md-12');
    $('#admin_cat').attr('class','btn btn-default col-md-12');
    jQuery.ajax({
      url: 'show_table.php',
      type: 'POST',
      data: {show_table:x},
      success: function(data)
      {
        tab.html(data);
        tab2.empty();
      }
    });
  });


  $(document).on('click', '#admin_product', function(e){
    e.preventDefault();
    var x='set';
    var tab=$('#fortable');
    var tab2=$('#fortable2');
     $(this).attr('class','btn btn-primary col-md-12');
    $('#admin_user').attr('class','btn btn-default col-md-12');
    $('#admin_cat').attr('class','btn btn-default col-md-12');
    jQuery.ajax({
      url: 'show_ptable.php',
      type: 'POST',
      data: {show_ptable:x},
      success: function(data)
      {
        tab.html(data);
        tab2.empty();
      }
    });
  });


  $(document).on('click', '#admin_cat', function(e){
    e.preventDefault();
    var x='set';
    var tab=$('#fortable');
     var tab2=$('#fortable2');
      $(this).attr('class','btn btn-primary col-md-12');
    $('#admin_product').attr('class','btn btn-default col-md-12');
    $('#admin_user').attr('class','btn btn-default col-md-12');

    jQuery.ajax({
      url: 'show_ptable.php',
      type: 'POST',
      data: {cshow_ptable:x},
      success: function(data)
      {
        tab.html(data);
        tab2.empty();
      }
    });
  });




   $(document).on('click', '#addpro', function(e){
    e.preventDefault();
    window.location='insertion.php';
   
    var x='set';
    jQuery.ajax({
      url: 'insertion.php',
      type: 'POST',
      data: {addtotable:x},
      success: function(data)
      {
  
      }
    });
  });

    $(document).on('click', '#addcat', function(e){
    e.preventDefault();
     window.location='cinsertion.php';
   
    var x='set';
    jQuery.ajax({
      url: 'cinsertion.php',
      type: 'POST',
      data: {caddtotable:x},
      success: function(data)
      {
  
      }
    });
  });




  $(document).on('click', '#ipsubmit1', function(e){
    e.preventDefault();
   window.location='admin.php';
    var newname=$('#newname').val();
  
    var ipprice=$('#ipprice').val();
    var ipcategory=$('#ipcategory option:selected').text();
    var tabx=$('#fortable3');
    var taby=$('#fordiv');
    jQuery.ajax({
        url: 'insertion.php',
        type: 'POST',
        data: ({
          pprice:ipprice,
          pcategory:ipcategory,
          pname1:newname
        }),
        success: function(data)
        {
          tabx.append(data);
        }
       });  
    });


   $(document).on('click', '#icpsubmit1', function(e){
    e.preventDefault();
    /*var filename=$('#newimage').val();
    alert(filename);
    var fileedit=filename.replace('C:\\fakepath\\','');
    alert(fileedit);*/
    var cname=$('#cname').val();
    var cdes=$('#cdes').val();
    var tabx=$('#fortable3');
    var taby=$('#fordiv');
    jQuery.ajax({
        url: 'admin.php',
        type: 'POST',
        data: ({
      //    pfilename:filename,
          pdes:cdes,
          pcname1:cname
        }),
        success: function(data)
        {
          taby.empty();
          tabx.append(data);
        }
       });  
    });

  $(document).on('keyup', '#isearch', function(e){
    //$('#isearch').keyup(function(){
     e.preventDefault();
     var tab4=$('#fortable2');
     var get1=$(this).val();
     jQuery.ajax({
        url: 'show_ptable.php',
        type: 'POST',
        data: ({get2:get1}),
        success: function(data)
        {
          tab4.html(data);
        }
     });
  });


  $(document).on('keyup', '#icsearch', function(e){
    //$('#isearch').keyup(function(){
     e.preventDefault();
     var tab4=$('#fortable2');
     var get1=$(this).val();
     jQuery.ajax({
        url: 'show_ptable.php',
        type: 'POST',
        data: ({cget2:get1}),
        success: function(data)
        {
          tab4.html(data);
        }
     });
  });


  $(document).on('click', '.delete1', function(e){
    e.preventDefault();
    var el=this;
    var jsid=$(this).attr('id');
    jQuery.ajax({
      url: 'main.php',
      type: 'POST',
      data: ( {del_id:jsid} ),
      success: function(data){
        $(el).closest('tr').fadeOut(10,function(){
          $(this).remove();   
        });
      }
    }); 
  });

  $(document).on('click', '.cdelete1', function(e){
    e.preventDefault();
    var el=this;
    var jsid=$(this).attr('id');
    jQuery.ajax({
      url: 'main.php',
      type: 'POST',
      data: ( {cdel_id:jsid} ),
      success: function(data){
        $(el).closest('tr').fadeOut(10,function(){
          $(this).remove();   
        });
      }
    }); 
  });


 
  $(document).on('click','#edit1',function(e){
    e.preventDefault();
    var el2=this;
    var jsclass=$(this).attr('name');
    var form_var=$('#fordiv');

    //alert(jsclass);
    jQuery.ajax({
      url: 'update.php',
      type:'POST',
      data: ( {edit_id:jsclass} ),
      success: function(data){
  
        form_var.html(data);

      }
    });
  });


   $(document).on('click','#cedit1',function(e){
    e.preventDefault();
    var el2=this;
    var jsclass=$(this).attr('name');
    var form_var=$('#fordiv');

    //alert(jsclass);
    jQuery.ajax({
      url: 'update.php',
      type:'POST',
      data: ( {cedit_id:jsclass} ),
      success: function(data){
  
        form_var.html(data);

      }
    });
  });


  $(document).on('click','#isubmit2',function(e){
    e.preventDefault();
  
    var el='#row'+$(this).attr('name');
    var aname=$('#newname').val();
    var ades=$('#ipdes').val();
    //var aquan=$('#ipquan').val();
    var aprice=$('#ipprice').val();
    var acategory=$('#ipcategory').val();
    var jsedit=$(this).attr('name');
    var clean=$('#fordiv');
    jQuery.ajax({
      url: 'update.php',
      type: 'POST',
      data: {edit_set:jsedit,
        edit_name:aname,
        edit_des:ades,
      //  edit_quan:aquan,
        edit_price:aprice,
        edit_category:acategory
      },
      success: function(data){
        console.log(data);
        $(el).html(data);
        clean.empty();
      }
    });
  });


   $(document).on('click','#icsubmit2',function(e){
    e.preventDefault();
  
    var el='#crow'+$(this).attr('name');
    var aname=$('#cname').val();
    var ades=$('#cdes').val();
    var jsedit=$(this).attr('name');
    var clean=$('#fordiv');

    jQuery.ajax({
      url: 'update.php',
      type: 'POST',
      data: {cedit_set:jsedit,
        edit_name:aname,
        edit_des:ades,
      },
      success: function(data){
        console.log(data);
        $(el).html(data);
        clean.empty();
      }
    });
  });




});
    