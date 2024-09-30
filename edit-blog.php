<?php

session_start();

  if($_SESSION['username'] && $_SESSION['userpass']){

    include_once 'vendor/includes/head.php';

    require_once 'vendor/includes/config.php';

    ?>

<script src="https://cdn.tiny.cloud/1/8zasoy5qn1ig63iam4b7v7apvzcbj5jq4dtddjcdhqfyhsso/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <?php

    include_once 'vendor/includes/nav.php';

    ?>

    <main class="pt-5 mx-lg-5">

    	<div class="container-fluid mt-5">



    	<div class="container-fluid mt-5">

	    	<div class="card mb-4 wow fadeIn">

	        	<!--Card content-->

		        <div class="card-body d-sm-flex justify-content-center">

		          <h4 class="mb-2 mb-sm-0 pt-1">

		            Edit Post

		          </h4>

		        </div>

	      </div>

		</div>

		

		<?php if(isset($_GET['error'])){ ?>

                <div class="alert alert-warning" style="text-align: center;"> <?= $_GET['error']; ?> </div>

        <?php } ?>

        

        <?php if(isset($_GET['done'])){ ?>

                <div class="alert alert-success" style="text-align: center;"> <?= $_GET['done']; ?> </div>

        <?php } ?>

		

		<?php

		$id = $_GET['id'];

		$q = "SELECT * FROM `blogs` WHERE `id` = ?;";

		$statement = mysqli_stmt_init($con);

		if(!mysqli_stmt_prepare($statement, $q)){

			header("location:mg-posts.php?err");

		}

		mysqli_stmt_bind_param($statement, "i", $id);

		mysqli_stmt_execute($statement);

		$result = mysqli_stmt_get_result($statement);

		$re = mysqli_fetch_assoc($result);

		?>



		<!-- first input -->

		<form action="edit_blog.php" method="post" enctype="multipart/form-data">

		    <input type="text" style="display:none;" name="id" value="<?= $re['id']; ?>" />

            <div class="row">

                <div class="col-1"></div>

                <div class="col-10">

                    <div class="md-form">

                        <input type="text" id="form1" name="title" value="<?php echo $re['title']; ?>" class="form-control" required>

                        <label for="form1">Title of the post</label>

                    </div>

                </div>

                <div class="col-1"></div>

            </div>

		<!--first input ends-->

		<!--second input-->

		<div class="row">

			<div class="col-2"></div>

			<div class="col-8">

				<!-- Material input -->

				<div class="md-form">

				  <input type="text" id="form2" name="description" value="<?php echo $re['description']; ?>" class="form-control" required>

				  <label for="form2">Description of the post</label>

				</div>

			</div>

			<div class="col-2"></div>

		</div>

		<!--second input ends-->

		
		<div class="row">

			<div class="col-2"></div>

			<div class="col-8">

				<!-- Material input -->

				<div class="md-form">

				  <input type="text" id="form3" name="slug" class="form-control" value="<?php echo $re['slug']; ?>" required>

				  <label for="form3">Slug</label>

				</div>

			</div>

			<div class="col-2"></div>

		</div>

        <div class="row">

			<div class="col-2"></div>

			<div class="col-8">

				<!-- Material input -->

				<div class="md-form">

				  <input type="file" name="image" class="form-control">

				  <small>Upload Featured Image</small>

				</div>

			</div>

			<div class="col-2"></div>

		</div>



	</div>

				<textarea rows="30" name="content" required><?php echo $re['article']; ?>

				</textarea>



		<div class="row pt-4">

			<div class="col-5"></div>

			<div class="col-4">

				<button type="submit" class="btn btn-primary">Post</button>

			</div>

			<div class="col-3"></div>

		</div>

	</form>





	</div>

	</main>

  		  		<script>

  			tinymce.init({selector: "textarea",

							  plugins: " advlist autolink autoresize autosave charmap lists codesample emoticons hr image insertdatetime link lists media nonbreaking pagebreak paste preview  searchreplace tabfocus table toc visualblocks wordcount code codesample",

							  toolbar: "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist  | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  print | insertfile image media pageembed template link anchor codesample | preview code | customInsertButton Adbutton Adbutton1 Adbutton2 Adbutton3",

							      setup: function (editor) {

    

                                    editor.ui.registry.addButton('customInsertButton', {

                                      text: 'Ad 1',

                                      onAction: function (_) {

                                        editor.insertContent('<pre class=\"language-markup\"><code>&lt;script async src=\"https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"&gt;&lt;/script&gt;\n&lt;ins class=\"adsbygoogle\"\n     style=\"display:block; text-align:center;\"\n     data-ad-layout=\"in-article\"\n     data-ad-format=\"fluid\"\n     data-ad-client=\"ca-pub-8317283695412754\"\n     data-ad-slot=\"7057059564\"&gt;&lt;/ins&gt;\n&lt;script&gt;\n     (adsbygoogle = window.adsbygoogle || []).push({});\n&lt;/script&gt;</code></pre>');

                                      }

                                    });

                                    

                                    editor.ui.registry.addButton('Adbutton', {

                                      text: 'Ad 2',

                                      onAction: function (_) {

                                        editor.insertContent('<pre class=\"language-markup\"><code>&lt;script async src=\"https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"&gt;&lt;/script&gt;\n&lt;ins class=\"adsbygoogle\"\n     style=\"display:block; text-align:center;\"\n     data-ad-layout=\"in-article\"\n     data-ad-format=\"fluid\"\n     data-ad-client=\"ca-pub-8317283695412754\"\n     data-ad-slot=\"7731314151\"&gt;&lt;/ins&gt;\n&lt;script&gt;\n     (adsbygoogle = window.adsbygoogle || []).push({});\n&lt;/script&gt;</code></pre>');

                                      }

                                    });

                                    

                                    editor.ui.registry.addButton('Adbutton1', {

                                      text: 'Ad 3',

                                      onAction: function (_) {

                                        editor.insertContent('<pre class=\"language-markup\"><code>&lt;script async src=\"https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"&gt;&lt;/script&gt;\n&lt;ins class=\"adsbygoogle\"\n     style=\"display:block; text-align:center;\"\n     data-ad-layout=\"in-article\"\n     data-ad-format=\"fluid\"\n     data-ad-client=\"ca-pub-8317283695412754\"\n     data-ad-slot=\"3838150659\"&gt;&lt;/ins&gt;\n&lt;script&gt;\n     (adsbygoogle = window.adsbygoogle || []).push({});\n&lt;/script&gt;</code></pre>');

                                      }

                                    });

                                    

                                    editor.ui.registry.addButton('Adbutton2', {

                                      text: 'Ad 4',

                                      onAction: function (_) {

                                        editor.insertContent('<pre class=\"language-markup\"><code>&lt;script async src=\"https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"&gt;&lt;/script&gt;\n&lt;ins class=\"adsbygoogle\"\n     style=\"display:block; text-align:center;\"\n     data-ad-layout=\"in-article\"\n     data-ad-format=\"fluid\"\n     data-ad-client=\"ca-pub-8317283695412754\"\n     data-ad-slot=\"6084205895\"&gt;&lt;/ins&gt;\n&lt;script&gt;\n     (adsbygoogle = window.adsbygoogle || []).push({});\n&lt;/script&gt;</code></pre>');

                                      }

                                    });

                                    

                                    editor.ui.registry.addButton('Adbutton3', {

                                      text: 'Ad 5',

                                      onAction: function (_) {

                                        editor.insertContent('<pre class=\"language-markup\"><code>&lt;script async src=\"https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"&gt;&lt;/script&gt;\n&lt;ins class=\"adsbygoogle\"\n     style=\"display:block; text-align:center;\"\n     data-ad-layout=\"in-article\"\n     data-ad-format=\"fluid\"\n     data-ad-client=\"ca-pub-8317283695412754\"\n     data-ad-slot=\"9750072441\"&gt;&lt;/ins&gt;\n&lt;script&gt;\n     (adsbygoogle = window.adsbygoogle || []).push({});\n&lt;/script&gt;</code></pre>');

                                      }

                                    });

                                

                                    var toTimeHtml = function (date) {

                                      return '<time datetime="' + date.toString() + '">' + date.toDateString() + '</time>';

                                    };

                                

                                    editor.ui.registry.addButton('customDateButton', {

                                      icon: 'insert-time',

                                      tooltip: 'Insert Current Date',

                                      disabled: true,

                                      onAction: function (_) {

                                        editor.insertContent(toTimeHtml(new Date()));

                                      },

                                      onSetup: function (buttonApi) {

                                        var editorEventCallback = function (eventApi) {

                                          buttonApi.setDisabled(eventApi.element.nodeName.toLowerCase() === 'time');

                                        };

                                        editor.on('NodeChange', editorEventCallback);

                                

                                        /* onSetup should always return the unbind handlers */

                                        return function (buttonApi) {

                                          editor.off('NodeChange', editorEventCallback);

                                        };

                                      }

                                    });

                                  },

							  menubar: "tools",

							    image_class_list: [

                                {title: 'None', value: ''},

                                {title: 'Responsive', value: 'img-fluid'},

                                ],

                                images_upload_handler: function (blobInfo, success, failure) {

                                var xhr, formData;

                    

                                xhr = new XMLHttpRequest();

                                xhr.withCredentials = false;

                                xhr.open('POST', 'editorImageUpload.php');

                    

                                xhr.onload = function() {

                                  var json; 

                    

                                  if (xhr.status != 200) {

                                    failure('HTTP Error: ' + xhr.status);

                                    return;

                                  }

                    

                                  console.log(xhr.response);

                                  //your validation with the responce goes here

                    

                                  success(xhr.response);

                                };

                    

                                formData = new FormData();

                                formData.append('file', blobInfo.blob(), blobInfo.filename());

                    

                                xhr.send(formData);

                           }

							  });

		</script>



    <?php include_once 'vendor/includes/footer.php'; ?>



</body>



</html>

<?php

}else{

  header("location:logout.php");

}

?>