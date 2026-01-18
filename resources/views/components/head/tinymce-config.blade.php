<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    content_style: "p { margin: 0; }",
    newline_behavior: 'invert',
    forced_root_block: 'div',
    height:180,
    paste_as_text: true,
    selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists powerpaste',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | paste'
  
  
  });
</script>



