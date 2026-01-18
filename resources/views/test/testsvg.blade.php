<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organigram</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.8.0/css/jquery.orgchart.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.8.0/js/jquery.orgchart.min.js"></script>
    <style>
        #chart-container {
  font-family: Arial;
  height: 420px;
  border: 2px dashed #aaa;
  border-radius: 5px;
  overflow: auto;
  text-align: center;
}

.orgchart {
  background: #fff; 
}
.orgchart td.left, .orgchart td.right, .orgchart td.top {
  border-color: #aaa;
}
.orgchart td>.down {
  background-color: #aaa;
}
.orgchart .middle-level .title {
  background-color: #006699;
}
.orgchart .middle-level .content {
  border-color: #006699;
}
.orgchart .product-dept .title {
  background-color: #009933;
}
.orgchart .product-dept .content {
  border-color: #009933;
}
.orgchart .rd-dept .title {
  background-color: #993366;
}
.orgchart .rd-dept .content {
  border-color: #993366;
}
.orgchart .pipeline1 .title {
  background-color: #996633;
}
.orgchart .pipeline1 .content {
  border-color: #996633;
}
.orgchart .frontend1 .title {
  background-color: #cc0066;
}
.orgchart .frontend1 .content {
  border-color: #cc0066;
}

#github-link {
  position: fixed;
  top: 0px;
  right: 10px;
  font-size: 3em;
}
    </style>
</head>
<body>
    <div id="chart-container"></div>

    {{-- <a id="github-link" href="https://github.com/dabeng/OrgChart" target="_blank"><i class="fa fa-github-square"></i></a> --}}

    <script>
       'use strict';

(function($){

  $(function() {

    var datascource = {
      'name': 'Lao Lao',
      'title': 'general manager',
      'url': '/general-manager',
      'children': [
        { 'name': 'Bo Miao', 'title': 'department manager', 'className': 'middle-level', 'url': '/dept-manager-1',
          'children': [
            { 'name': 'Li Jing', 'title': 'senior engineer', 'className': 'product-dept', 'url': '/engineer-1' },
            { 'name': 'Li Xin', 'title': 'senior engineer', 'className': 'product-dept', 'url': '/engineer-2',
              'children': [
                { 'name': 'To To', 'title': 'engineer', 'className': 'pipeline1', 'url': '/engineer-3' },
                { 'name': 'Fei Fei', 'title': 'engineer', 'className': 'pipeline1', 'url': '/engineer-4' },
                { 'name': 'Xuan Xuan', 'title': null, 'className': 'pipeline1', 'url': '/engineer-5' }
              ]
            }
          ]
        },
        { 'name': 'Su Miao', 'title': 'department manager', 'className': 'middle-level', 'url': '/balize-a',
          'children': [
            { 'name': 'Pang Pang', 'title': 'senior engineer', 'className': 'rd-dept', 'url': '/engineer-6' },
            { 'name': 'Hei Hei', 'title': 'senior engineer', 'className': 'rd-dept', 'url': '/engineer-7',
              'children': [
                { 'name': 'Xiang Xiang', 'title': 'UE engineer', 'className': 'frontend1', 'url': '/engineer-8' },
                { 'name': 'Dan Dan', 'title': 'engineer', 'className': 'frontend1', 'url': '/engineer-9' },
                { 'name': 'Zai Zai', 'title': 'engineer', 'className': 'frontend1', 'url': '/engineer-10' }
              ]
            }
          ]
        }
      ]
    };

    var oc = $('#chart-container').orgchart({
      'data' : datascource,
      'nodeContent': 'title',
      'createNode': function($node, data) {
        if (data.url) {
          $node.on('click', function() {
            window.location.href = data.url;
          });
          $node.css('cursor', 'pointer');
        }
         $node.find('.content').remove();
      }
    });

  });

})(jQuery);
    </script>
</body>
</html>