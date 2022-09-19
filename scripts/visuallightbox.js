(function ($) {
    $.fn.visualLightbox = function (options) {
        var activeImage = null, badObjects = ["select", "object", "embed"], groupName = null, imageArray = [], slideShowTimer = null, startImage = null, descriptionHeight = 50, imgPreloader, showTimer;
        if (!document.getElementsByTagName) {
            return;
        }
        options = $.extend({
            animate: true,
            autoPlay: true,
            borderSize: 39,
            containerID: document,
            enableSlideshow: true,
            googleAnalytics: false,
            imageDataLocation: "south",
            closeLocation: "",
            initImage: "",
            loop: true,
            overlayDuration: 0.2,
            overlayOpacity: 0.7,
            prefix: "",
            classNames: "vlightbox",
            resizeSpeed: 7,
            showGroupName: false,
            slideTime: 8,
            strings: {
                closeLink: "",
                loadingMsg: "loading",
                nextLink: "",
                prevLink: "",
                startSlideshow: "",
                stopSlideshow: "",
                numDisplayPrefix: "",
                numDisplaySeparator: "/"
            },
            featBrowser: true,
            breathingSize: 20,
            startZoom: false,
            floating: true
        }, options);
        if (options.animate) {
            var overlayDuration = Math.max(options.overlayDuration, 0);
            options.resizeSpeed = Math.max(Math.min(options.resizeSpeed, 10), 1);
            var resizeDuration = (11 - options.resizeSpeed) * 0.80;
        } else {
            var overlayDuration = 0;
            var resizeDuration = 0;
        }
        var enableSlideshow = options.enableSlideshow;
        options.overlayOpacity = Math.max(Math.min(options.overlayOpacity, 1), 0);
        var playSlides = options.autoPlay;
        var container = $(options.containerID);
        var classNames = options.classNames;
        updateImageList();
        var objBody = container.length && container.get(0) != document ? container.get(0) : document.getElementsByTagName("body").item(0);
        if (objBody.childNodes.length) {
            $(objBody.childNodes[0]).before($("<div></div>"));
            objBody = objBody.childNodes[0];
        }
        var objOverlay = document.createElement("div");
        objOverlay.setAttribute("id", getID("overlay"));
        objOverlay.style.display = "none";
        objBody.appendChild(objOverlay);
        $(objOverlay).click(end);

        var objLightbox = document.createElement("div");
        objLightbox.setAttribute("id", getID("lightbox"));
        objLightbox.style.display = "none";
        objBody.appendChild(objLightbox);
        $(objLightbox).click(end);

        var objImageDataContainer = document.createElement("div");
        objImageDataContainer.setAttribute("id", getID("imageDataContainer"));
        objImageDataContainer.className = getID("clearfix");

        var objImageData = document.createElement("div");
        objImageData.setAttribute("id", getID("imageData"));
        objImageDataContainer.appendChild(objImageData);

        var objImageDetails = document.createElement("div");
        objImageDetails.setAttribute("id", getID("imageDetails"));
        objImageData.appendChild(objImageDetails);

        var objCaption = document.createElement("div");
        objCaption.setAttribute("id", getID("caption"));
        objImageDetails.appendChild(objCaption);

        var objNumberDisplay = document.createElement("span");
        objNumberDisplay.setAttribute("id", getID("numberDisplay"));
        objImageDetails.appendChild(objNumberDisplay);

        var objDetailsNav = document.createElement("span");
        objDetailsNav.setAttribute("id", getID("detailsNav"));
        objImageDetails.appendChild(objDetailsNav);

        var objPrevLink = document.createElement("a");
        objPrevLink.setAttribute("id", getID("prevLinkDetails"));
        objPrevLink.setAttribute("href", "javascript:void(0);");
        objPrevLink.innerHTML = options.strings.prevLink;
        objDetailsNav.appendChild(objPrevLink);
        $(objPrevLink).click(showPrev);

        var objSlideShowControl = document.createElement("a");
        objSlideShowControl.setAttribute("id", getID("slideShowControl"));
        objSlideShowControl.setAttribute("href", "javascript:void(0);");
        objDetailsNav.appendChild(objSlideShowControl);
        $(objSlideShowControl).click(toggleSlideShow);

        var objNextLink = document.createElement("a");
        objNextLink.setAttribute("id", getID("nextLinkDetails"));
        objNextLink.setAttribute("href", "javascript:void(0);");
        objNextLink.innerHTML = options.strings.nextLink;
        objDetailsNav.appendChild(objNextLink);
        $(objNextLink).click(showNext);

        var objOuterImageContainer = document.createElement("table");
        objOuterImageContainer.setAttribute("id", getID("outerImageContainer"));
        objOuterImageContainer.cellSpacing = 0;
        objLightbox.appendChild(objOuterImageContainer);

        var objOICTop = objOuterImageContainer.insertRow(-1);
        var objOICTL = objOICTop.insertCell(-1);
        objOICTL.className = "tl";

        var objOICTC = objOICTop.insertCell(-1);
        objOICTC.className = "tc";

        var objOICTR = objOICTop.insertCell(-1);
        objOICTR.className = "tr";

        var objOICMiddle = objOuterImageContainer.insertRow(-1);
        var objOICML = objOICMiddle.insertCell(-1);
        objOICML.className = "ml";

        var objLightboxFrameBody = objOICMiddle.insertCell(-1);
        objLightboxFrameBody.setAttribute("id", getID("lightboxFrameBody"));
        objLightboxFrameBody.innerHTML = "&nbsp;";

        var objOICMR = objOICMiddle.insertCell(-1);
        objOICMR.className = "mr";

        var objOICBottom = objOuterImageContainer.insertRow(-1);

        var objOICBL = objOICBottom.insertCell(-1);
        objOICBL.className = "bl";

        var objOICBC = objOICBottom.insertCell(-1);
        objOICBC.className = "bc";

        var objOICBR = objOICBottom.insertCell(-1);
        objOICBR.className = "br";

        if (options.imageDataLocation == "north") {
            objLightboxFrameBody.appendChild(objImageDataContainer);
        }

        var objImageContainer = document.createElement("div");
        objImageContainer.setAttribute("id", getID("imageContainer"));
        objLightboxFrameBody.appendChild(objImageContainer);

        var objLightboxImage = document.createElement("img");
        objLightboxImage.setAttribute("id", getID("lightboxImage"));
        objImageContainer.appendChild(objLightboxImage);

        var objHoverNav = document.createElement("div");
        objHoverNav.setAttribute("id", getID("hoverNav"));
        objImageContainer.appendChild(objHoverNav);

        var objPrevLinkImg = document.createElement("a");
        objPrevLinkImg.setAttribute("id", getID("prevLinkImg"));
        objPrevLinkImg.setAttribute("href", "javascript:void(0);");
        objHoverNav.appendChild(objPrevLinkImg);
        $(objPrevLinkImg).click(showPrev);

        var objNextLinkImg = document.createElement("a");
        objNextLinkImg.setAttribute("id", getID("nextLinkImg"));
        objNextLinkImg.setAttribute("href", "javascript:void(0);");
        objHoverNav.appendChild(objNextLinkImg);

        $(objNextLinkImg).click(showNext);
        var objLoading = document.createElement("div");
        objLoading.setAttribute("id", getID("loading"));
        objImageContainer.appendChild(objLoading);

        var objLoadingLink = document.createElement("a");
        objLoadingLink.setAttribute("id", getID("loadingLink"));
        objLoadingLink.setAttribute("href", "javascript:void(0);");
        objLoadingLink.innerHTML = options.strings.loadingMsg;
        objLoading.appendChild(objLoadingLink);
        $(objLoadingLink).click(end);

        if (options.imageDataLocation != "north") {
            objLightboxFrameBody.appendChild(objImageDataContainer);
        }

        var objClose = document.createElement("div");
        objClose.setAttribute("id", getID("close"));

        if (options.closeLocation == "top") {
            objOICTR.appendChild(objClose);
        } else {
            objImageData.appendChild(objClose);
        }

        var objCloseLink = document.createElement("a");
        objCloseLink.setAttribute("id", getID("closeLink"));
        objCloseLink.setAttribute("href", "javascript:void(0);");
        objCloseLink.innerHTML = options.strings.closeLink;
        objClose.appendChild(objCloseLink);
        $(objCloseLink).click(end);

        if (options.initImage != "") {
            start("#" + options.initImage);
        }
        function getHref(Node) {
            Node = $(Node);
            if (Node.attr("tagName") != "A") {
                Node = $("A:first", Node);
            }
            return $(Node).attr("href");
        }
        function getTitle(Node) {
            Node = $(Node);
            if (Node.attr("tagName") == "A") {
                return Node.attr("title");
            }
            return $(">*:last", Node).html();
        }
        function updateImageList() {
            $("." + classNames.replace(/^\,/, ".$&"), container).each(function () {
                if (getHref(this)) {
                    this.onclick = function () {
                        start(this);
                        return false;
                    }
                        ;
                }
            });
        }

        var start = this.start = function (imageLink) {
            hideBadObjects();
            imageLink = $(imageLink);
            $$("overlay").css({
                height: docWH()[1] + "px"
            });
            $$("imageDataContainer").hide();
            $$("lightboxImage").hide().attr({
                src: ""
            });
            if (options.startZoom) {
                $$("imageContainer").css({
                    width: imageLink.width() + "px",
                    height: imageLink.height() + "px"
                });
                if (!document.all) {
                    $$("outerImageContainer").css({
                        opacity: 0.1
                    });
                }
                $$("lightbox").css({
                    left: imageLink.offset().left - options.borderSize + "px",
                    top: imageLink.offset().top - options.borderSize + "px",
                    width: imageLink.width() + options.borderSize * 2 + "px",
                    height: "auto"
                });
            } else {
                $$("overlay").css({
                    opacity: 0
                }).show().fadeTo(overlayDuration * 1000, options.overlayOpacity);
                $$("lightbox").css({
                    left: 0,
                    width: "100%"
                });
            }
            $$("lightbox").show();
            imageArray = [];
            groupName = null;
            startImage = 0;
            $("." + imageLink.attr("className"), container).each(function () {
                if (getHref(this)) {
                    imageArray.push({
                        link: getHref(this),
                        title: getTitle(this)
                    });
                    if (this == imageLink.get(0)) {
                        startImage = imageArray.length - 1;
                    }
                }
            });
            if (imageArray.length > 1) {
                groupName = imageLink.attr("className");
            }
            if (options.featBrowser) {
                $(window).resize(adjustImageSizeNoEffect);
            }
            if (options.floating) {
                $(window).scroll(adjustImageSizeNoEffect);
            }
            $(window).resize(adjustOverlay);
            $(window).scroll(adjustOverlay);
            changeImage(startImage);
        }
            ;
        function changeImage(imageNum) {
            activeImage = imageNum;
            disableKeyboardNav();
            pauseSlideShow();
            showLoading();
            if (!options.startZoom) {
                $$("lightboxImage").hide();
            }
            $$("hoverNav").hide();
            $$("imageDataContainer").hide();
            $$("numberDisplay").hide();
            $$("detailsNav").hide();
            imgPreloader = new Image;
            imgPreloader.onload = function () {
                imageArray[activeImage].link = imgPreloader.src;
                imageArray[activeImage].width = imgPreloader.width;
                imageArray[activeImage].height = imgPreloader.height;
                adjustImageSize(false);
            }
                ;
            if (options.startZoom && !$$("lightboxImage").attr("src")) {
                imageArray[activeImage].width = 320;
                imageArray[activeImage].height = 240;
                adjustImageSize(false, true);
            }
            imgPreloader.src = imageArray[activeImage].link;
            if (options.googleAnalytics) {
                urchinTracker(imageArray[activeImage].link);
            }
        }
        function adjustImageSize(recall, noImage) {
            var imgWidth = imageArray[activeImage].width;
            var imgHeight = imageArray[activeImage].height;
            var arrayPageSize = getPageSize();
            var imageProportion = imgWidth / imgHeight;
            if (options.featBrowser) {
                var winProportion = arrayPageSize.winWidth / arrayPageSize.winHeight;
                if (imageProportion > winProportion) {
                    var maxWidth = arrayPageSize.winWidth - options.borderSize * 2 - options.breathingSize * 2;
                    var maxHeight = Math.round(maxWidth / imageProportion);
                } else {
                    var maxHeight = arrayPageSize.winHeight - options.borderSize * 2 - options.breathingSize * 2 - descriptionHeight;
                    var maxWidth = Math.round(maxHeight * imageProportion);
                }
                if (imgWidth > maxWidth || imgHeight > maxHeight) {
                    imgWidth = maxWidth;
                    imgHeight = maxHeight;
                }
            }
            var imgTop = getPageScroll().y + (getPageSize().winHeight - (imgHeight + descriptionHeight + options.borderSize * 2)) / 2;
            var imageContainer = $$("imageContainer");
            if (recall == true) {
                imageContainer.css({
                    height: imgHeight + "px",
                    width: imgWidth + "px"
                });
                if (options.floating) {
                    moveEffect($$("lightbox"), imgTop);
                } else {
                    $$("lightbox").css({
                        top: imgTop + "px"
                    });
                }
            } else {
                var lightboxImage = $$("lightboxImage");
                imageContainer.stop(true, false);
                lightboxImage.stop(true, false);
                var lightboxImage2;
                if (options.startZoom && lightboxImage.attr("src")) {
                    lightboxImage2 = lightboxImage;
                    lightboxImage2.attr({
                        id: getID("lightboxImage2")
                    });
                } else {
                    lightboxImage.remove();
                }
                if (!noImage) {
                    lightboxImage = $(imgPreloader);
                    lightboxImage.hide();
                    lightboxImage.attr({
                        id: getID("lightboxImage")
                    });
                    imageContainer.append(lightboxImage);
                }
                with (imageContainer) {
                    var resizeFactor = imageProportion / (width() / height());
                }
                if (!noImage) {
                    if (options.startZoom) {
                        if (lightboxImage2) {
                            $$("lightboxImage2").stop(true, true);
                        }
                        var zoomF = lightboxImage2 ? 120 : 100;
                        if (lightboxImage2) {
                            with (lightboxImage2) {
                                css({
                                    width: 1 > resizeFactor ? "auto" : width() / parent().width() * 100 + "%",
                                    height: 1 > resizeFactor ? height() / parent().height() * 100 + "%" : "auto",
                                    left: 0,
                                    top: 0
                                });
                            }
                        }
                        lightboxImage.css({
                            opacity: 0,
                            display: "block",
                            position: "absolute",
                            width: 1 > resizeFactor ? zoomF + "%" : "auto",
                            height: 1 > resizeFactor ? "auto" : zoomF + "%",
                            left: (100 - zoomF * (1 > resizeFactor ? 1 : resizeFactor)) / 2 + "%",
                            top: (100 - zoomF * (1 > resizeFactor ? 1 / resizeFactor : 1)) / 2 + "%"
                        });
                    }
                    if (options.startZoom) {
                        hideLoading();
                    }
                }
                resizeImageContainer(imgTop, imgWidth, imgHeight, resizeFactor, noImage);
            }
            $$("imageDataContainer").css({
                width: imgWidth + "px"
            });
        }
        function resizeImageContainer(imgTop, imgWidth, imgHeight, resizeFactor, noImage) {
            var imageContainer = $$("imageContainer");
            var lightboxImage = $$("lightboxImage");
            var lightbox = $$("lightbox");
            if (!noImage) {
                var lightboxImage2 = $$("lightboxImage2");
            }
            if (options.startZoom) {
                lightboxImage.fadeTo(resizeDuration * 1000, 1);
                if (!document.all) {
                    $$("outerImageContainer").fadeTo(resizeDuration * 1000, 1);
                }
            }
            moveEffect(lightbox, imgTop);
            if (options.startZoom && !noImage) {
                lightboxImage2.animate($.extend({
                    opacity: 0
                }, resizeFactor < 1 ? {
                    height: "120%",
                    top: "-10%",
                    left: (100 - 120 / resizeFactor) / 2 + "%"
                } : {
                    width: "120%",
                    left: "-10%",
                    top: (100 - resizeFactor * 120) / 2 + "%"
                }), {
                    queue: false,
                    duration: resizeDuration * 1000,
                    complete: function () {
                        $(this).remove();
                    }
                });
                lightboxImage.animate($.extend({
                    left: 0,
                    top: 0
                }, resizeFactor < 1 ? {
                    width: "100%"
                } : {
                    height: "100%"
                }), {
                    queue: false,
                    duration: resizeDuration * 1000
                });
            }
            imageContainer.animate({
                width: imgWidth + "px",
                height: imgHeight + "px"
            }, {
                queue: false,
                duration: resizeDuration * 1000,
                complete: !noImage ? function () {
                    showImage();
                }
                    : null
            });
        }
        function moveEffect(lightbox, imgTop) {
            lightbox.stop(true, false);
            lightbox.animate({
                width: "100%",
                left: 0,
                top: imgTop
            }, {
                queue: false,
                duration: resizeDuration * 1000
            });
        }
        function showLoading() {
            clearTimeout(showTimer);
            var loading = $$("loading");
            loading.show();
            loading.css({
                visibility: "hidden"
            });
            showTimer = setTimeout(function () {
                $$("loading").css({
                    visibility: "visible"
                });
            }, 300);
        }
        function hideLoading() {
            clearTimeout(showTimer);
            $$("loading").hide();
        }
        function showImage() {
            hideLoading();
            if (options.startZoom) {
                $$("overlay:hidden").css({
                    opacity: 0
                }).show().fadeTo(overlayDuration * 1000, options.overlayOpacity);
                updateDetails();
            } else {
                $$("lightboxImage").css({
                    opacity: 0
                }).show().fadeTo(500, 1, function () {
                    updateDetails();
                });
            }
            preloadNeighborImages();
        }
        function updateDetails() {
            $$("caption").show();
            $$("caption").html(imageArray[activeImage].title || "");
            if (imageArray.length > 1) {
                var num_display = options.strings.numDisplayPrefix + " " + eval(activeImage + 1) + " " + options.strings.numDisplaySeparator + " " + imageArray.length;
                if (options.showGroupName && groupName) {
                    num_display += " " + options.strings.numDisplaySeparator + " " + groupName;
                }
                $$("numberDisplay").text(num_display).show();
                if (!enableSlideshow) {
                    $$("slideShowControl").hide();
                }
                $$("detailsNav").show();
            }
            $$("imageDataContainer").animate({
                height: "show",
                opacity: "show"
            }, 650, null, function () {
                updateNav();
            });
        }
        function updateNav() {
            var d = 1 / imageArray.length;
            descriptionHeight = descriptionHeight * (1 - d) + $$("imageDataContainer").height() * d;
            if (imageArray.length > 1) {
                $$("hoverNav").show();
                if (enableSlideshow) {
                    if (playSlides) {
                        startSlideShow();
                    } else {
                        stopSlideShow();
                    }
                }
            }
            enableKeyboardNav();
        }
        function startSlideShow() {
            if ($$("lightbox:hidden").length) {
                return;
            }
            pauseSlideShow();
            playSlides = true;
            slideShowTimer = setTimeout(function () {
                showNext();
            }, options.slideTime * 1000);
            $$("slideShowControl").text(options.strings.stopSlideshow);
            $$("slideShowControl").addClass("started");
        }
        function stopSlideShow() {
            playSlides = false;
            pauseSlideShow();
            $$("slideShowControl").text(options.strings.startSlideshow);
            $$("slideShowControl").removeClass("started");
        }
        function toggleSlideShow() {
            if (playSlides) {
                stopSlideShow();
            } else {
                startSlideShow();
            }
        }
        function pauseSlideShow() {
            if (slideShowTimer) {
                slideShowTimer = clearTimeout(slideShowTimer);
            }
        }
        function showNext() {
            if (imageArray.length > 1) {
                pauseSlideShow();
                if (!options.loop && (activeImage == imageArray.length - 1 && startImage == 0 || activeImage + 1 == startImage)) {
                    end();
                    return;
                }
                if (activeImage == imageArray.length - 1) {
                    changeImageWithData(0);
                } else {
                    changeImageWithData(activeImage + 1);
                }
            }
        }
        function changeImageWithData(imageNum) {
            $$("imageDataContainer").animate({
                height: "hide",
                opacity: "hide"
            }, 650, null, function () {
                changeImage(imageNum);
            });
        }
        function showPrev() {
            if (imageArray.length > 1) {
                if (activeImage == 0) {
                    changeImageWithData(imageArray.length - 1);
                } else {
                    changeImageWithData(activeImage - 1);
                }
            }
        }
        function showFirst() {
            if (imageArray.length > 1) {
                changeImageWithData(0);
            }
        }
        function showLast() {
            if (imageArray.length > 1) {
                changeImageWithData(imageArray.length - 1);
            }
        }
        function enableKeyboardNav() {
            document.onkeydown = keyboardAction;
        }
        function disableKeyboardNav() {
            document.onkeydown = "";
        }
        function keyboardAction(e) {
            if (e == null) {
                keycode = event.keyCode;
            } else {
                keycode = e.which;
            }
            key = String.fromCharCode(keycode).toLowerCase();
            if (key == "x" || key == "o" || key == "c") {
                end();
            } else if (key == "p" || key == "%") {
                showPrev();
            } else if (key == "n" || key == "'") {
                showNext();
            } else if (key == "f") {
                showFirst();
            } else if (key == "l") {
                showLast();
            } else if (key == "s") {
                if (imageArray.length > 0 && options.enableSlideshow) {
                    toggleSlideShow();
                }
            }
        }
        function preloadNeighborImages() {
            var nextImageID = imageArray.length - 1 == activeImage ? 0 : activeImage + 1;
            (new Image).src = imageArray[nextImageID].link;
            var prevImageID = activeImage == 0 ? imageArray.length - 1 : activeImage - 1;
            (new Image).src = imageArray[prevImageID].link;
        }
        function end(Event) {
            if (Event) {
                var id = $(Event.target).attr("id");
                if (getID("closeLink") != id && getID("lightbox") != id && getID("overlay") != id) {
                    return;
                }
            }
            $$("imageContainer").stop(true, false);
            $$("lightboxImage").stop(true, false);
            imgPreloader.onload = null;
            disableKeyboardNav();
            pauseSlideShow();
            $$("lightbox").hide();
            if (options.overlayOpacity) {
                $$("overlay").fadeOut(overlayDuration * 1000);
            } else {
                $$("overlay").hide();
            }
            $(window).unbind("resize", adjustImageSizeNoEffect);
            $(window).unbind("scroll", adjustImageSizeNoEffect);
            $(window).unbind("resize", adjustOverlay);
            $(window).unbind("scroll", adjustOverlay);
            showBadObjects();
        }
        function adjustImageSizeNoEffect() {
            adjustImageSize(true);
        }
        function adjustOverlay() {
            $$("overlay").css({
                left: getPageScroll().x + "px",
                top: 0,
                width: "100%",
                height: docWH()[1] + "px"
            });
        }
        function showBadObjects() {
            var els;
            var tags = badObjects;
            for (var i = 0; i < tags.length; i++) {
                els = document.getElementsByTagName(tags[i]);
                for (var j = 0; j < els.length; j++) {
                    $(els[j]).css({
                        visibility: "visible"
                    });
                }
            }
        }
        function hideBadObjects() {
            var tags = badObjects;
            for (var i = 0; i < tags.length; i++) {
                $(tags[i]).css({
                    visibility: "hidden"
                });
            }
        }
        function getPageScroll() {
            var x, y;
            if (self.pageYOffset) {
                x = self.pageXOffset;
                y = self.pageYOffset;
            } else if (document.documentElement && document.documentElement.scrollTop) {
                x = document.documentElement.scrollLeft;
                y = document.documentElement.scrollTop;
            } else if (document.body) {
                x = document.body.scrollLeft;
                y = document.body.scrollTop;
            }
            return {
                x: x,
                y: y
            };
        }
        function getPageSize() {
            var windowX, windowY;
            if (self.innerHeight) {
                windowX = self.innerWidth;
                windowY = self.innerHeight;
            } else if (document.documentElement && document.documentElement.clientHeight) {
                windowX = document.documentElement.clientWidth;
                windowY = document.documentElement.clientHeight;
            } else if (document.body) {
                windowX = document.body.clientWidth;
                windowY = document.body.clientHeight;
            }
            return {
                winWidth: windowX,
                winHeight: windowY
            };
        }
        function docWH() {
            var b = document.body
                , e = document.documentElement
                , w = 0
                , h = 0;
            if (e) {
                w = Math.max(w, e.scrollWidth, e.offsetWidth);
                h = Math.max(h, e.scrollHeight, e.offsetHeight);
            }
            if (b) {
                w = Math.max(w, b.scrollWidth, b.offsetWidth);
                h = Math.max(h, b.scrollHeight, b.offsetHeight);
                if (window.innerWidth) {
                    w = Math.max(w, window.innerWidth);
                    h = Math.max(h, window.innerHeight);
                }
            }
            return [w, h];
        }
        function getID(id) {
            return options.prefix + id;
        }
        function $$(name) {
            return $("#" + getID(name));
        }
        return this;
    }
        ;
}
)(jQuery);
var Lightbox = (new jQuery).visualLightbox($VisualLightBoxParams$);