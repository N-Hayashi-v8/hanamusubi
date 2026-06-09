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

// 幸せレポートのカルーセル（3枚表示・5枚を無限ループ）
// DOMを回転させる方式: クローンを作らず、端の1枚を反対側へ移動する
const reportTrack = document.querySelector(".p-report__track");
const reportPrev = document.querySelector(".p-report__arrow--prev");
const reportNext = document.querySelector(".p-report__arrow--next");

if (reportTrack && reportPrev && reportNext) {
  const duration = 400; // ms。SCSS側のtransitionと揃える
  let animating = false;

  // 1枚ぶんの移動量（カード幅＋gap）を実測
  const stepX = () => {
    const first = reportTrack.firstElementChild;
    const gap = parseFloat(getComputedStyle(reportTrack).columnGap) || 0;
    return first.getBoundingClientRect().width + gap;
  };

  const goNext = () => {
    if (animating) return;
    animating = true;
    reportTrack.style.transition = `transform ${duration}ms ease`;
    reportTrack.style.transform = `translateX(-${stepX()}px)`;
    reportTrack.addEventListener("transitionend", () => {
      reportTrack.style.transition = "none";
      reportTrack.style.transform = "translateX(0)";
      reportTrack.appendChild(reportTrack.firstElementChild); // 先頭を末尾へ
      animating = false;
    }, { once: true });
  };

  const goPrev = () => {
    if (animating) return;
    animating = true;
    // 先に末尾を先頭へ移し、その分ずらした位置から0へ戻す
    reportTrack.insertBefore(reportTrack.lastElementChild, reportTrack.firstElementChild);
    reportTrack.style.transition = "none";
    reportTrack.style.transform = `translateX(-${stepX()}px)`;
    requestAnimationFrame(() => {
      reportTrack.style.transition = `transform ${duration}ms ease`;
      reportTrack.style.transform = "translateX(0)";
    });
    reportTrack.addEventListener("transitionend", () => {
      animating = false;
    }, { once: true });
  };

  reportNext.addEventListener("click", goNext);
  reportPrev.addEventListener("click", goPrev);
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
