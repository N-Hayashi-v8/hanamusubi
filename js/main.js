// メインビジュアルのスライドショー
// 5秒ごとに .is-active を付け替えてクロスフェード
const slides = document.querySelectorAll(".p-mv__slide");

if (slides.length > 1) {
  let current = 0;

  setInterval(() => {
    slides[current].classList.remove("is-active");
    current = (current + 1) % slides.length;
    slides[current].classList.add("is-active");
  }, 5000);
}

// ヘッダーのスクロール固定（上端到達で .is-fixed を付与）
const header = document.querySelector(".l-header");
const mv = document.querySelector(".p-mv");

if (header && mv) {
  // ヘッダーが上端に達するスクロール量
  // = FV上端からの距離 + FV高さ − ヘッダー高さ
  let threshold = 0;
  const updateThreshold = () => {
    threshold = mv.offsetTop + mv.offsetHeight - header.offsetHeight;
  };

  const onScroll = () => {
    if (window.scrollY >= threshold) {
      header.classList.add("is-fixed");
    } else {
      header.classList.remove("is-fixed");
    }
  };

  // 画像読込後に高さが確定するので load で測る
  window.addEventListener("load", () => {
    updateThreshold();
    onScroll();
  });
  window.addEventListener("scroll", onScroll);
  window.addEventListener("resize", () => {
    updateThreshold();
    onScroll();
  });
}
