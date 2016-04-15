<!--  -->
  <div class="row">
    <!-- Left col -->
    <div class="col-md-8">
      <!-- TABLE: LATEST POSTS -->

          {{--*/ $ths = array(
              'post_id'       => "Post ID",
              'post_title'    => "Title",    
              'post_status'    => "Status",
              'post_countviews'   => "View Count"
          );/*--}}

         @foreach($posts as $post)
           {{--*/ 
           $tbs[] = array(
                'post_id'       => $html ='<td>'.$post->id.'</td>',
                'post_title'    => $html ='<td><a href="">'.$post->title.'</a></td>',    
                'post_status'    => $html ='<td><span class="label label-success">'.$post->status.'</span></td>',
                'post_countviews' => $html ='<td><div class="sparkbar" data-color="#00a65a" data-height="20">'.$post->count_views.'</div></td>'
            );/*--}}
         @endforeach
          <!-- Table_Header -->
          {{--*/ $header = array(
              'title'   => "Latest Posts"
          );/*--}}
          <!-- Table_Content -->   
          {{--*/ $table = array(
              'ths'   => $ths,
              'tbs'   => $tbs
          );/*--}}
          <!-- Footer_Content -->
          {{--*/ $footer = array(
              'footerLeft'   => "Create New Post",
              'footerRight'   => "View All Posts"
          );/*--}}
          <!-- Data_Content -->
          {{--*/ $boxContent = array(
              'header'   => $header,
              'table'   => $table,
              'footer'   => $footer
          );/*--}}

         {!! Ooglee\Infrastructure\HtmlBuilders\HtmlBuilderHelpers::getBoxHtml($boxContent) !!}

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->