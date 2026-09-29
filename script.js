// トップへ戻る
const pagetop = document.querySelector('.pagetop');

// トップへ戻るボタンの処理　これだと#で上に移動させないのでurlに#が付かなくて綺麗にできる
pagetop.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    })
})

window.addEventListener('scroll', () => {
    // 300pxスクロールしたら表示させる
    if (window.scrollY > 300) {
        pagetop.classList.add('show');
    } else {
        pagetop.classList.remove('show');
    }
})

// ハンバーガーメニュー内のリンクをクリックしたらメニューを閉じる
const drawerCheckbox = document.getElementById('drawer-checkbox');
const gnavLinks = document.querySelectorAll('.gnav a');

gnavLinks.forEach(link => {
    link.addEventListener('click', () => {
        drawerCheckbox.checked = false;
    });
});


//スクロールしてエリアが切り替わる時に次のコンテンツと重ねる
scrollOverlap();
function scrollOverlap() {
    const targets = document.querySelectorAll('.section');
    if (targets.length === 0) return;

    let lastWinHight = window.innerHeight;

    const setStickyOffset = () => {
        targets.forEach((target) => {
            const targetHeight = target.offsetHeight;
            // 画面よりコンテンツが大きい場合はスクロール完了時に固定、小さい場合は画面最上部(-1px)で固定
            const offsetValue = lastWinHight >= targetHeight ? '-1px' : `-${targetHeight - lastWinHight}px`;
            target.style.setProperty('--sticky-offset', offsetValue);
        });
    };

    setStickyOffset();

    window.addEventListener('resize', () => {
        const winHight = window.innerHeight;
        if (lastWinHight !== winHight) {
            lastWinHight = winHight;
            setStickyOffset();
        }
    });

    const body = document.body;
    const resizeObserver = new ResizeObserver(() => {
        setStickyOffset();
    });
    resizeObserver.observe(body);

    // キーボード操作用の設定
    const toggleDisabledClass = (boolean) => {
        targets.forEach((target) => {
            target.classList.toggle('is-disabled', boolean);
        });
    };

    let isKeyboardFocus = false;
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Tab') {
            isKeyboardFocus = true;
            toggleDisabledClass(isKeyboardFocus);
        }
    });

    document.addEventListener('mousedown', () => {
        if (isKeyboardFocus) {
            isKeyboardFocus = false;
            toggleDisabledClass(isKeyboardFocus);
        }
    });
}


// URLコピー機能
// const copyBtn = document.getElementById('js-copy-btn');
// const copyMsg = document.getElementById('js-copy-msg');

// if (copyBtn && copyMsg) {
//     copyBtn.addEventListener('click', () => {
//         const url = copyBtn.getAttribute('data-url');

//         // クリップボードにURLを書き込み
//         navigator.clipboard.writeText(url).then(() => {
//             copyMsg.textContent = 'URLをコピーしました！';
//             copyMsg.classList.add('is-active');

//             // 2秒後にメッセージを非表示化
//             setTimeout(() => {
//                 copyMsg.textContent = '';
//                 copyMsg.classList.remove('is-active');
//             }, 2000);
//         }).catch(err => {
//             console.error('コピーに失敗しました:', err);
//         });
//     });
// }

// URLコピー機能（非SSL環境・古いブラウザにも対応）
const copyBtn = document.getElementById('js-copy-btn');
const copyMsg = document.getElementById('js-copy-msg');

if (copyBtn && copyMsg) {
    copyBtn.addEventListener('click', () => {
        const url = copyBtn.getAttribute('data-url');

        // コピー成功時の共通処理
        const showSuccessMessage = () => {
            copyMsg.textContent = 'URLをコピーしました！';
            copyMsg.classList.add('is-active');

            setTimeout(() => {
                copyMsg.textContent = '';
                copyMsg.classList.remove('is-active');
            }, 2000);
        };

        // クリップボードAPIが使用可能な場合 (HTTPS環境など)
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(url).then(() => {
                showSuccessMessage();
            }).catch(err => {
                console.error('コピーに失敗しました:', err);
            });
        } else {
            // クリップボードAPIが使えない場合 (HTTP環境など) のフォールバック処理
            const textarea = document.createElement('textarea');
            textarea.value = url;
            textarea.style.position = 'fixed';
            textarea.style.opacity = '0';
            document.body.appendChild(textarea);
            textarea.select();

            try {
                document.execCommand('copy');
                showSuccessMessage();
            } catch (err) {
                console.error('コピーに失敗しました:', err);
            } finally {
                document.body.removeChild(textarea);
            }
        }
    });
}