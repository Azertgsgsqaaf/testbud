document.addEventListener("DOMContentLoaded", () => {
    gsap.registerPlugin(ScrollTrigger);

    const lenis = new Lenis();
    lenis.on("scroll", ScrollTrigger.update);
    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });
    gsap.ticker.lagSmoothing(0);

    const nav = document.querySelector("nav");
    const header = document.querySelector("header");
    const canvas = document.querySelector("canvas");
    const context = canvas.getContext("2d");

    const setCanvasSize = () => {
        const pixelRatio = window.devicePixelRatio || 1;
        canvas.width = window.innerWidth * pixelRatio;
        canvas.height = window.innerHeight * pixelRatio;
        canvas.style.width = `${window.innerWidth}px`;
        canvas.style.height = `${window.innerHeight}px`;
        context.scale(pixelRatio, pixelRatio);
    };
    setCanvasSize();

    const frameCount = 144;
    const currentFrame = (index) =>
         `./images/frame_00086${(index + 400).toString().padStart(3, '0')}.jpg`;
    let images = [];
    let video = { frame: 0  };
    let imagesToLoad = frameCount;

    const onLoad = () => {
        imagesToLoad--;

        if (!imagesToLoad ) {
            render()
            setupScrollTrigger();
        }
    };

    for (let i = 0; i < frameCount; i++) {
        const img = new Image();
        img.onload = onLoad;
        img.onerror = function() {
            onLoad.call(this);
        };
        img.src = currentFrame(i);
        images.push(img);
    }

    const render = () => {
        const canvasWidth = window.innerWidth;
        const canvasHeight = window.innerHeight;

        context.clearRect(0, 0, canvasWidth, canvasHeight);

        const img = images[video.frame];
        if (img && img.complete && img.naturalWidth > 0) {
            const imgAspectRatio = img.naturalWidth / img.naturalHeight;
            const canvasAspect = canvasWidth / canvasHeight;

            let drawWidth, drawHeight, drawX, drawY;

            if (imgAspectRatio > canvasAspect) {
                drawHeight = canvasHeight;
                drawWidth = drawHeight * imgAspectRatio;
                drawX = (canvasWidth - drawWidth) / 2;
                drawY = 0;
            } else {
                drawWidth = canvasWidth;
                drawHeight = drawWidth / imgAspectRatio;
                drawX = 0;
                drawY = (canvasHeight - drawHeight) / 2;
            }
            context.drawImage(img, drawX, drawY, drawWidth, drawHeight);
        }
    }

    const setupScrollTrigger = () => {
        ScrollTrigger.create({
            trigger: ".hero",
            start: "top top",
            end: "+=5000px",  // Augmenter pour une séquence plus longue en plein écran
            pin: true,
            pinSpacing: true,
            scrub: 1,
            onUpdate: (self) => {
                const progress = self.progress;

                const animationProgress = Math.min(Math.max(progress / 0.9, 0), 1);
                const targetFrame = Math.round(animationProgress * (frameCount -
                     1));
                video.frame = targetFrame;
                render();

                if (progress <= 0.1) {
                    const navProgress = progress / 0.1;
                    const opacity = 1 - navProgress;
                    gsap.set(nav, { opacity});
                } else {
                    gsap.set(nav, { opacity: 0 });
                }
              },
            });
        };
});
    