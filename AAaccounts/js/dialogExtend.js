
(function($){

  $.fn.newDialog=function(options)
  {

    //$("<a>123</a>").html();
    // var dialogID="myModalMember";
    // var headerContent="添加成员"

    var defaults={

      id:'my_Modal_Member',
      title:'添加成员',
      header:'',
      body:'',
      footer:''

    };

    var options=$.extend(defaults,options);
    

    var outside=$('<div class="modal" id='+options.id+'>');

    var outsideDialog=$('<div class="modal-dialog"></div>');
    var outsideDialogContent=$('<div class="modal-content"></div>');

    var contentHeader=$('<div class="modal-header"></div>');
    var contentBody=$('<div class="modal-body"></div>');
    var contentFooter=$('<div class="modal-footer"></div>');

    outsideDialogContent.append(contentHeader);
    outsideDialogContent.append(contentBody);
    outsideDialogContent.append(contentFooter);
    outsideDialog.append(outsideDialogContent);
    outside.append(outsideDialog);


    this.append(outside);

    options.header=' <button class="close" data-dismiss="modal"><span>&times;</span></button><h4>'+options.title+'</h4>';

    contentHeader.html(options.header);

    contentBody.html(options.body);

    contentFooter.html(options.footer);



  }

})(jQuery);