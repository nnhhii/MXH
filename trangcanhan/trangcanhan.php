<head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
  .hidden {
    display: none;
  }

  .bia {
    margin: 11vh 5% 0 5%;
    height: 34vw;
    width: 90%;
    border-radius: 5px;
  }

  .bia>.bia1 {
    float: right;
    width: 78%;
    background-size: cover;
    background-position: center;
    border-radius: 0 5px 5px 0;
    height: 34vw;
    position: relative;
  }

  .bia>.khungcanhan {
    background: linear-gradient(to bottom, gray, white);
    float: left;
    height: 34vw;
    width: 22%;
    border-radius: 5px 0 0 5px;
    position: relative;
  }

  .bia>.khungcanhan>.canhan1 {
    height: 15vh;
    position: relative;
    padding: 9vh 0 2vh 0
  }

  .bia>.khungcanhan>.canhan1>.anhdaidien {
    background-size: cover;
    background-position: center;
    width: 15vh;
    height: 15vh;
    border-radius: 50%;
    margin: auto;
    border: 3px solid white;
    position: relative;
  }

  .bia>.khungcanhan>.name {
    font-family: Helvetica, Arial, sans-serif;
    font-size: 1.8vw;
    text-align: center;
    margin-top: 10vh;
  }

  .bia>.khungcanhan>.name>.banbe {
    font-size: 1vw;
    color: dimgray;
  }

  .bia>.khungcanhan>.name>.tieusu {
    font-size: 1.2vw
  }

  .bia>.khungcanhan>.congcu {
    right: 0;
    left: 0;
    padding: 2vw 0.9vw 0 0.9vw;
    position: absolute;
    white-space: nowrap;
    display: flex
  }

  .congcu1 {
    margin: 1vw;
    font-size: 1.1vw;
    padding: 1vw 1.5vw;
    border: none;
    border-radius: 5px;
    background-color: #cecdca;
  }

  .congcu1:hover {
    background-color: #343a40;
    color: #f8f9fa;
  }

  .story_banbe {
    width: 90%;
    height: 15vh;
    margin-top: 1%;
    margin-left: 80px;
    float: left;
    display: flex;
    overflow: auto;
  }

  .ccbia,
  .ccbia1 {
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: #EEE;
  }

  .ccbia1 {
    right: 10%
  }

  .anhdaidien>img {
    position: absolute;
    right: 5px;
    bottom: 0;
    width: 3.5vh;
    cursor: pointer;
  }

  .bia>.khungcanhan>.congcu>div>form>input[type=text] {
    width: 12vw;
    height: 2vw;
    padding: 12px 20px;
    margin: 0 0 1vw 0;
    border: 1px solid #ccc;
    outline: none
  }
  .mess1 {
    width: 100%;
    height: 80px;
    float: left;
    color: black;
    transition: 0.2s;
  }

  .mess1:hover {
    background-color: rgb(247, 247, 247);
  }

  .col_left>a>.mess1.active {
    background-color: rgb(229, 228, 228)
  }

  .ava {
    background-size: cover;
    border-radius: 50%;
    padding: 30px;
    margin: 10px 0 0 10px;
    float: left;
    cursor: pointer;
  }

  .username {
    float: left;
    font-size: 14px;
    margin: 18px 0 0 10px;
    font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
    cursor: pointer;
    font-weight: 500;
  }

  .mini_content {
    float: left;
    font-size: 12px;
    margin: -5px 0 0 10px;
    font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
    color: gray;
  }
  .like-button_TCN {
    display: flex;
    transition: all 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    filter: grayscale(100%);
    padding:4px 0 3px 0;
}
.like-button_TCN.liked {
    color: red;
    filter: grayscale(0);
}
  @media(max-width:980px) {
    .bia>.khungcanhan {
      width: 40%;
      left: 28vw;
      height: 40vh;
      background: transparent;
      float: left;
    }

    .bia>.khungcanhan>.canhan1 {
      padding: 2vw;
      height: 5vw;
    }

    .bia>.khungcanhan>.canhan1>.anhdaidien {
      width: 15vh;
      height: 15vh;
      top: -10vh
    }

    .bia>.khungcanhan>.name {
      font-size: 3.5vh;
      margin-top: 3vh
    }

    .bia>.khungcanhan>.name>.banbe {
      font-size: 2vh;
    }

    .bia>.khungcanhan>.name>.tieusu {
      font-size: 2vh
    }

    .bia {
      width: 100%;
      margin: 9vh 0 0 0;
    }

    .bia>.bia1 {
      width: 100%;
      height: 40vh;
    }

    .bia>.khungcanhan>.congcu {
      padding: 2vw;
      white-space: nowrap;
    }

    .congcu1 {
      margin-left: 1.4vw;
      font-size: 2.5vh;
      padding: 1.8vw 4vw;
    }

    .ccbia1,
    .ccbia {
      right: 13.5vh;
      font-size: 2vh;
      padding: 2vh 3vh
    }

    .ccbia {
      right: 0
    }

  }

  @media(max-width:630px) {
    .bia>.khungcanhan {
      width: 70%;
      left: 15vw
    }

    .bia>.khungcanhan>.congcu {
      padding: 2vw;
      white-space: nowrap;
    }

    .congcu1 {
      margin-left: 6vw;
      font-size: 2.5vh;
      padding: 2vw 5vw;
    }

    .ccbia1,
    .ccbia {
      right: 13.5vh;
      font-size: 2vh;
      padding: 2vh 3vh
    }

    .ccbia {
      right: 0
    }
  }
  .story_banbe::-webkit-scrollbar {
  display: none; /* Safari và Chrome */
}
</style>

<div class="bia">
  <div class="bia1" style="background-image: url('img/<?php echo $row_id["cover_picture"] ?>')">
    <button class="ccbia congcu1" onclick="showFilePicker()">Chỉnh sửa</button>
    <form action="trangcanhan/suabia.php" method="post" enctype="multipart/form-data">
      <input type="file" id="filePicker" name="anhbia" style="display:none;" onchange="filePicked()" />
      <input type="submit" style="display:none" id="saveButton">
    </form>
    <script>
      function showFilePicker() {
        document.getElementById('filePicker').click();
      }
      function filePicked() {
        var input = document.getElementById('filePicker');
        if (input.files && input.files[0]) {
          console.log('Tệp đã chọn:', input.files[0].name);
        }
        document.getElementById('saveButton').click();
      }
    </script>
    <a onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh bìa?')" href="trangcanhan/xoabia.php">
      <button class="ccbia1 congcu1">Xóa</button>
    </a>
  </div>
  <div class="khungcanhan" style="position:relative"><div style="cursor:pointer;padding:20px"onclick="window.location.href = 'index.php?pid=14'"><i class="fa-regular fa-pen-to-square" style="scale:1.5;right:10px;top:10px;position:absolute"></i></div>
    <div class="canhan1">
      <div class="anhdaidien" style="background-image: url('img/<?php echo $row_id["avartar"] ?>')">
        <img src="https://cdn-icons-png.flaticon.com/512/3624/3624186.png" onclick="avartar()"></i>
      </div>
      <form action="trangcanhan/avartar.php" method="post" enctype="multipart/form-data" id="uploadForm">
        <input type="file" id="avatarPicker" name="anhdaidien" style="display:none;" onchange="avatarPicked()" />
        <input type="submit" style="display:none;" id="avatarSaveButton">
      </form>
      <script>
        function avartar() {
          document.getElementById('avatarPicker').click();
        }
        function avatarPicked() {
          var input = document.getElementById('avatarPicker');
          if (input.files && input.files[0]) {
            console.log('Tệp đã chọn:', input.files[0].name);
            document.getElementById('avatarSaveButton').click();
          }
        }
      </script>
    </div>
    <div class="name">
      <div><strong>
          <?php echo $row_id["username"] ?>
        </strong></div>
      <div class="banbe"><br>2939 bạn bè </div>
      <div class="tieusu"><br>
        <?php echo $row_id["bio"] ?>
      </div>
    </div>
    <div class="congcu">
      <button class="congcu1" id="editButton" onclick="FormTIEUSU()">Chỉnh sửa</button>
      <div id="inputForm" class="hidden">
        <form action="trangcanhan/suatieusu.php" method="post">
          <input type="text" value="<?php echo $row_id['bio'] ?>" name="tieusu" placeholder="Nhập tiểu sử của bạn"><br>
          <input type="submit" value="Lưu" style="border:none;padding:2px 10px">
          <button style="border:none;padding:2px 10px" type="button" onclick="cancelEdit()">Hủy</button>
        </form>
      </div>

      <script>
        function FormTIEUSU() {
          var form = document.getElementById("inputForm");
          var button = document.getElementById("editButton");
          form.style.display = "block";
          button.style.display = "none";
        }
        function cancelEdit() {
          var form = document.getElementById("inputForm");
          var button = document.getElementById("editButton");
          form.style.display = "none";
          button.style.display = "block";
        }
      </script>

      <a onclick="return confirm('Bạn có chắc chắn muốn xóa tiểu sử?')" href="trangcanhan/xoatieusu.php">
        <button class="congcu1">Xóa</button>
      </a>
    </div>
  </div>
</div>

<?php 
  $sql_buttonOpenModal = "SELECT * FROM posts inner join user on posts.post_by=user.user_id where user_id=$user_id ORDER BY post_id DESC";
  $result_buttonOpenModal = $ketnoi->query($sql_buttonOpenModal);
include 'dangbaiviet/posts_buttonOpenModal.php'?>

<script>
    $(document).ready(function () {
      $('.like-button_TCN').on('click', function (e) {
        e.preventDefault();
        var post_id = $(this).data('postid');
        var post_by = $(this).data('postby');
        var like_by = $('input[name="like_by"]').val();

        // Thay đổi trạng thái của nút like ngay lập tức
        $(this).toggleClass('liked');
        var isLiked = $(this).hasClass('liked');

        var likeButton = $(this); // Lưu trữ nút like hiện tại

        $.ajax({
          url: 'dangbaiviet/update_like_count.php',
          type: 'POST',
          data: {
            'post_id': post_id,
            'post_by': post_by,
            'like_by': like_by,
            'isLiked': isLiked
          },
          success: function (data) {
            // Cập nhật số lượng like trên trang web
            likeButton.parent().find('.like_count').text(data);
          }
        });
      });



      $('.submit_cmt_TCN').on('click', function (event) {
        event.preventDefault();
        var post_id = $(this).data('postid');
        var post_by = $(this).data('postby');
        var comment_by = $(this).data('cmtby');
        var cmt_content = $('textarea[name="cmt_content_' + post_id + '"]').val()
        $.ajax({
          type: "POST",
          url: "dangbaiviet/get_comments.php",
          data: {
            post_id: post_id,
            post_by: post_by,
            comment_by: comment_by,
            cmt_content: cmt_content
          },
          success: function (response) {
            var view_cmt = $('.view_cmt[data-postid="' + post_id + '"]');
            view_cmt.append(response);
            $('textarea[name="cmt_content_' + post_id + '"]').val('');
            view_cmt.find(".chuacobinhluan").remove();
            view_cmt.scrollTop(view_cmt[0].scrollHeight);
          }
        });
      });


      $('.send_post_btn').on('click', function (e) {
        e.preventDefault();
        var post_id = $(this).data('postid');
        var post_by = $(this).data('postby');
        // Thu thập dữ liệu từ các checkbox đã chọn
        var selectedValues = [];
        $('input[name="share_to"]:checked').each(function () {
          selectedValues.push($(this).val());
        });
        $.ajax({
          url: 'dangbaiviet/posts_share.php',
          type: 'post',
          data: {
            share_by: $('input[name="share_by"]').val(),
            post_id: post_id,
            post_by: post_by,
            share_to: selectedValues // Gửi mảng các giá trị đã chọn
          },
          success: function (response) {
            alert(response);
          }
        });
      });

      $('.timkiem1').on('input', function () {
        var timkiem = $(this).val();
        var postId = $(this).data('postid');
        var userId = $(this).data('userid');
        $.ajax({
          url: 'timkiem/timkiem.php',
          method: 'POST',
          data: {
            timkiem: timkiem,
            post_id: postId,
            user_id: userId
          },
          success: function (response) {
            $('.ketquatimkiem').html(response);
          }
        });
      });
    });

$(document).ready(function() {
  $('.modal').on('shown.bs.modal', function () {
    $(this).find('audio')[0].play();
  });

  $('.modal').on('hidden.bs.modal', function () {
    var audio = $(this).find('audio')[0];
    audio.pause();
    audio.currentTime = 0; // Reset audio về thời điểm ban đầu
  });
});
function stopAudio1(modal) {
  var audioId = modal.getAttribute("data-TCNstoryid");
  var audio = document.getElementById("audio_TCN_" + audioId);
  audio.stop = true; // Mute audio khi modal được đóng
}
</script>

<!-- LUOT ANH -->
<script>
  function initSliders() {
    const sliders = document.querySelectorAll('.slide-show');
    sliders.forEach((slider, index) => {
      const sliderController = new SliderController(slider, index);
    });
  }

  function SliderController(slider, index) {
    const listElement = slider.querySelector('.list-images');
    const imgs = slider.querySelectorAll('.list-images img');
    const btnLeft = slider.querySelector('.btn-left');
    const btnRight = slider.querySelector('.btn-right');
    const length = (imgs.length);
    let current = 0;

    const updateButtonVisibility = () => {
      if (current === 0) {
        btnLeft.style.display = 'none';
      } else {
        btnLeft.style.display = 'block';
      }

      if (current === length - 1) {
        btnRight.style.display = 'none';
      } else {
        btnRight.style.display = 'block';
      }
    };

    const updateActiveIndex = () => {
      slider.querySelector('.index-item.active').classList.remove('active');
      slider.querySelector('.index-item-' + current).classList.add('active');
    };

    const handleChangeSlide = (direction) => {
      if (direction === 'right') {
        current = (current + 1) % length;
      } else if (direction === 'left') {
        current = (current - 1 + length) % length;
      }

      let width = imgs[0].offsetWidth;
      listElement.style.transform = `translateX(${-width * current}px)`;

      updateButtonVisibility();
      updateActiveIndex();
    };

    btnRight.addEventListener('click', () => {
      handleChangeSlide('right');
    });

    btnLeft.addEventListener('click', () => {
      handleChangeSlide('left');
    });

    // Khởi tạo hiển thị ban đầu
    updateButtonVisibility();
  }

  // Gọi hàm khởi tạo sliders khi trang được load
  document.addEventListener('DOMContentLoaded', initSliders);

   // luu bai viet
$(document).ready(function() {
    // Kiểm tra trạng thái lưu của mỗi bài viết khi tải trang
    $('.save').each(function() {
        var post_id = $(this).data('postid');
        var user_id = $(this).data('saveby');
        var icon = $(this).find('i');

        $.ajax({
            url: 'menu/trangthailuu.php',
            type: 'POST',
            data: {
                post_id: post_id,
                user_id: user_id
            },
            success: function(response) {
                if (response === "saved") {
                    icon.removeClass('fa-regular fa-bookmark').addClass('fa-solid fa-bookmark');
                } else {
                    icon.removeClass('fa-solid fa-bookmark').addClass('fa-regular fa-bookmark');
                }
            }
        });
    });

    // Cập nhật trạng thái lưu khi người dùng nhấp vào nút lưu
    $('.save').click(function() {
        var post_id = $(this).data('postid');
        var user_id = $(this).data('saveby');
        var icon = $(this).find('i');

        $.ajax({
            url: 'menu/luubaiviet.php',
            type: 'POST',
            data: {
                post_id: post_id,
                user_id: user_id
            },
            success: function(response) {
                if (response === "success") {
                    icon.removeClass('fa-regular fa-bookmark').addClass('fa-solid fa-bookmark');
                } else if (response === "deleted") {
                    icon.removeClass('fa-solid fa-bookmark').addClass('fa-regular fa-bookmark');
                }
            }
        });
    });
});

</script>