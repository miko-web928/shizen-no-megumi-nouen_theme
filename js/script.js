// ハンバーガーメニュー
jQuery(function () {
  jQuery('.menu-btn').click(function () {
    jQuery(this).toggleClass('active');

    if (jQuery(this).hasClass('active')) {
      jQuery('.header').addClass('active');
      jQuery('.header-common').addClass('active');
      jQuery('.header__sp').addClass('active');
    } else {
      jQuery('.header').removeClass('active');
      jQuery('.header-common').removeClass('active');
      jQuery('.header__sp').removeClass('active');
    }
  });
});

// ヘッダーの固定スクロール設定
jQuery(function () {
  var header = jQuery("#header , #header-common");
  var scrollSize = 200; //超えると表示
  jQuery(window).on("load scroll", function () {
    var value = jQuery(this).scrollTop();
    if (value > scrollSize) {
      header.addClass("scroll");
    } else {
      header.removeClass("scroll");
    }
  });
});

// FVの新着記事フェードアウト
jQuery(function () {
  var article = jQuery(".new-articles");
  var scrollSize = 100; //超えると表示
  jQuery(window).on("load scroll", function () {
    var value = jQuery(this).scrollTop();
    if (value > scrollSize) {
      article.addClass("hidden");
    } else {
      article.removeClass("hidden");
    }
  });
});
// var this_element;
// jQuery(window).on('load',function(){
// 	this_element = jQuery('#about').offset().top + jQuery('#about').outerHeight();
// });

// jQuery(window).scroll(function(){
// 	if(jQuery(window).scrollTop() + jQuery(window).height() > this_element){
// 		jQuery('.new-articles').fadeOut();
// 	} else {
// 		jQuery('.new-articles').fadeIn();
// 	}
// });

// 時間差フェードイン
window.addEventListener('scroll', function(){
  // スクロール量を取得
  const scroll = window.scrollY;
  // 画面の高さを取得
  const windowHeight = window.innerHeight;
  // すべての.boxを取得
  const boxes = document.querySelectorAll('.fadeIn');

  boxes.forEach(function(box) {
    // boxまでの高さを取得
    const distanceToBox = box.offsetTop;
    // 下記条件が成り立つときだけboxにis-activeクラスを付与する
    if(scroll + windowHeight > distanceToBox) {
      box.classList.add('is-active');
    }
  });
});

// アコーディオンメニュー
jQuery(function () {
  jQuery(".js-accordion-title").on("click", function () {
    jQuery(".js-accordion-title").not(this).removeClass("open");
    jQuery(".js-accordion-title").not(this).next().slideUp(200);
    jQuery(this).toggleClass("open");
    jQuery(this).next().slideToggle(200);
  });
});

// tabのクラスつけ外し
jQuery(function () {
  jQuery('.tab-list-item').on('click', function () {
    let index = jQuery('.tab-list-item').index(this);

    jQuery('.tab-list-item').removeClass('is-btn-active');
    jQuery(this).addClass('is-btn-active');
    jQuery('.tab-contents').removeClass('is-contents-active');
    jQuery('.tab-contents').eq(index).addClass('is-contents-active');
  });
});

// スクロールのドラッグ有効化
jQuery.prototype.mousedragscrollable = function () {
  let target;
  jQuery(this).each(function (i, e) {
    jQuery(e).mousedown(function (event) {
      event.preventDefault();
      target = jQuery(e);
      jQuery(e).data({
        down: true,
        move: false,
        x: event.clientX,
        y: event.clientY,
        scrollleft: jQuery(e).scrollLeft(),
        scrolltop: jQuery(e).scrollTop(),
      });
      return false;
    });
    jQuery(e).click(function (event) {
      if ($(e).data("move")) {
        return false;
      }
    });
  });
  jQuery(document)
    .mousemove(function (event) {
      if (jQuery(target).data("down")) {
        event.preventDefault();
        let move_x = jQuery(target).data("x") - event.clientX;
        let move_y = jQuery(target).data("y") - event.clientY;
        if (move_x !== 0 || move_y !== 0) {
          jQuery(target).data("move", true);
        } else {
          return;
        }
        jQuery(target).scrollLeft($(target).data("scrollleft") + move_x);
        jQuery(target).scrollTop($(target).data("scrolltop") + move_y);
        return false;
      }
    })
    .mouseup(function (event) {
      jQuery(target).data("down", false);
      return false;
    });
};
jQuery(".tab-list").mousedragscrollable();

// slick
jQuery(function () {
  jQuery(".slider").slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 0,
    centerMode: true,
    centerPadding: "30px",
    slidesToShow: 3,
    speed: 3000,
    swipe: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1, // 画面幅750px以下でスライド3枚表示
        }
      }
    ]
  });
});

// slickのタブ切り替え
jQuery(function () {
  // slick
  const tabs = jQuery('.js-tabs');
  const slider = jQuery('.js-slider');
  tabs.slick({
    arrows: false,
    asNavFor: '.js-slider',
    draggable: false,
    focusOnSelect: true,
    infinite: false,
    swipe: false,
    variableWidth: true,
    initialSlide: 0,
  });
  slider.slick({
    arrows: false,
    asNavFor: '.js-tabs',
    infinite: false,
    swipe: true,
    touchThreshold: 10,
    initialSlide: 0,
    adaptiveHeight: true, //自動でスライダーの高さを調整する
  });

  //↓ここがポイント!タブの切替ボタンをクリックしたらsetPositionが動く
  jQuery('.js-tabs').click(function () {//クラス名を指定しました
    slider.slick('setPosition');
  });

  jQuery('.js-tabs').on('beforeChange', function(){
    jQuery('.slick-current').removeClass('is-active');
  });
  jQuery('.js-tabs').on('afterChange', function(){
    jQuery('.slick-current').addClass('is-active');
  });


  tabs.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    const body_width = jQuery(window).innerWidth(); // ウィンドウ幅
    const active_tag = jQuery('[data-slick-index="' + nextSlide + '"]'); // 選択したタブ
    const active_tab_width = active_tag.innerWidth(); // 選択したタブの幅
    const active_tab_position = active_tag.position().left; // 選択したタブのX座標
    const scroll_left = active_tab_position - (body_width - active_tab_width) / 2; // 横スクロール量
    // 選択したタブが画面の中央に表示されるようスクロール
    jQuery('.slide__tabs__wrap').animate({ scrollLeft: scroll_left }, 300, 'swing');
  });
});

jQuery(document).ready(function($) {
  // 各カテゴリーに対応する初期スライドのマッピング
  var categoryInitialSlides = {
      'category1': 1, // カテゴリー1に対する初期スライドのインデックス
      'category2': 2, // カテゴリー2に対する初期スライドのインデックス
      'category3': 3, // カテゴリー3に対する初期スライドのインデックス
      // 他のカテゴリーも同様に追加
  };

  // カテゴリーごとに初期スライドを設定する関数
  function setInitialSlideForCategory(category) {
      var initialSlide = categoryInitialSlides[category];
      $('.js-slider').slick('slickGoTo', initialSlide);
  }

  // タブ切り替え時に初期スライドを設定する
  $('.js-tabs').on('click', function() {
      var category = $(this).data('category'); // タブのカテゴリーを取得
      setInitialSlideForCategory(category);
  });
});


// selectタグopen時の設定
jQuery('.custom-select').each(function () {
  var classes = jQuery(this).attr("class"),
    id = jQuery(this).attr("id"),
    name = jQuery(this).attr("name");
  var template = '<div class="' + classes + '">';
  // ↓ ここに適切なプレースホルダーのテキストを設定してください ↓
  var placeholderText = "選択してください";
  template += '<span class="custom-select-trigger">' + placeholderText + '</span>';
  template += '<div class="custom-options">';
  jQuery(this).find("option").each(function () {
    template += '<span class="custom-option ' + jQuery(this).attr("class") + '" data-value="' + jQuery(this).attr("value") + '">' + jQuery(this).html() + '</span>';
  });
  template += '</div></div>';

  jQuery(this).wrap('<div class="custom-select-wrapper"></div>');
  jQuery(this).hide();
  jQuery(this).after(template);


});
jQuery(".custom-option:first-of-type").hover(function () {
  jQuery(this).parents(".custom-options").addClass("option-hover");
}, function () {
  jQuery(this).parents(".custom-options").removeClass("option-hover");
});
jQuery(".custom-select-trigger").on("click", function () {
  jQuery('html').one('click', function () {
    jQuery(".custom-select").removeClass("opened");
  });
  jQuery(this).parents(".custom-select").toggleClass("opened");
  event.stopPropagation();
});


jQuery(".custom-option").on("click", function () {
  var selectedValue = jQuery(this).data("value");
  var placeholderText = "Select an option"; // 任意のプレースホルダーテキスト
  jQuery(this).parents(".custom-select-wrapper").find("select").val(selectedValue);
  jQuery(this).parents(".custom-options").find(".custom-option").removeClass("selection");
  jQuery(this).addClass("selection");
  jQuery(this).parents(".custom-select").removeClass("opened");
  jQuery(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
  jQuery(this).parents(".custom-select-wrapper").find(".custom-select-trigger").css('color', '#000'); // 選択された後の文字色を黒に変更

});

// formの矢印向き
jQuery(function () {
  jQuery('select').click(function () {
    jQuery(this).toggleClass('active');

    if (jQuery(this).hasClass('active')) {
      jQuery('.custom-select').addClass('is-active');
    } else {
      jQuery('.custom-select').removeClass('is-active');
    }
  });
});

jQuery(document).ready(function() {
  // ドロップダウンリストの選択肢をカスタマイズ
  jQuery('.select-item option').each(function() {
      // ここに各オプションのデザインを適用するためのCSSを追加
      jQuery(this).css({
          // 例: 背景色、テキスト色、フォントなど
          'background-color': '#F9F9F9',
          'color': '#93C572',
          'border-bottom': '1px dotted #707070',
          'padding': '17px 0',
          'font-weight': 'bold',
      });
  });
});
