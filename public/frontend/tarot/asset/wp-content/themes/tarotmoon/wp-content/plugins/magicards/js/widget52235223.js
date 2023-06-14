/*
 * MagiCards - WordPress Plugin :: Widget
 * version: 1.0
 * Widget editor
 *  
 * Copyright 2017-2018 Nicola Franchini - @nicolafranchini
 */
jQuery(document).ready(function ($) {

   $('body').on('click', '.magicards_upload_image_button a', function(e) {
      e.preventDefault();
      var $button = $(this);
      var wrapper = $(this).parent('.magicards_upload_image_button');
      var file_frame;

      // If the media frame already exists, reopen it.
      if ( file_frame ) {
         file_frame.open();
         return;
      }

      file_frame = wp.media({
         title: 'Select',
         library: { // remove these to show all
            type: 'image' // specific mime
         },
         button: {
            text: 'Select'
         },
         multiple: false
      });
 
      file_frame.on('open',function() {
         var selection = file_frame.state().get('selection');
         var id = $button.siblings('input').val();
         selection.add( wp.media.attachment(id) );
      });

      file_frame.on('select', function () { 
         var attachment = file_frame.state().get('selection').first().toJSON();         
         var buttoncontent = attachment.sizes.thumbnail.url ? '<img src="'+attachment.sizes.thumbnail.url+'">' : '';

         var element = document.getElementById($button.siblings('input').attr('id'));
         var event = new Event('change');
         wrapper.find('.magicard-placeholder').html(buttoncontent);
         $button.siblings('input').val(attachment.id).trigger('change');
         element.dispatchEvent(event);
      });
 
      file_frame.open();
   });

   $('body').on('click', '.magicards_upload_gall_button a', function (e) {
      e.preventDefault();
      var $button = $(this);
      var file_frame;

      if ( file_frame ) {
         file_frame.open();
         return;
      }

      var file_frame = wp.media({
         title: 'Select',
         library: {
            type: 'image'
         },
         button: {
            text: 'Select'
         },
         multiple: 'add'
      });

      file_frame.on('open',function() {
         var selection = file_frame.state().get('selection');
         var ids = $button.siblings('input').val().split(',');

         ids = ids.filter(function(e){return e}); 

         ids.forEach(function(id) {
            attachment = wp.media.attachment(id);
            attachment.fetch();
            selection.add( attachment ? [ attachment ] : [] );
         });
      });

      file_frame.on('select', function () {
         var attachment = file_frame.state().get('selection').toJSON();
         var result = attachment.map(a => a.id);


         var element = document.getElementById($button.siblings('input').attr('id'));
         var event = new Event('change');

         $button.siblings('input').val(result.toString()).trigger('change');
         $button.find('.magicards-selected').html(result.length);
         element.dispatchEvent(event);
      });
      // Finally, open the modal
      file_frame.open();
   });

});
