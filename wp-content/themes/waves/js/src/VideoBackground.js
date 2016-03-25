(function() {
  var __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  this.VideoBackground = (function(_super) {
    __extends(VideoBackground, _super);

    function VideoBackground(baseurl) {
      this.debug = false;
      VideoBackground.__super__.constructor.call(this);
      this.requiresRedrawing = true;
      if (!this.detectVideoSupport()) {
        throw "No HTML5 video support detected";
      }
      this.fallback = this.createImageBackground("" + baseurl + ".jpg");
      this.video = this.createVideoElement(baseurl);
    }

    VideoBackground.prototype.createImageBackground = function(imageurl) {
      var fallback,
        _this = this;
      fallback = new ImageBackground(imageurl);
      fallback.setCallback(function() {
        if (_this.callback !== null) {
          return _this.callback();
        }
      });
      return fallback;
    };

    VideoBackground.prototype.createVideoElement = function(baseurl) {
      var video,
        _this = this;
      video = document.createElement('video');
      video.addEventListener('playing', function() {
        return _this.setReady();
      });
      this.setAttribute(video, 'poster', "" + baseurl + ".jpg");
      this.setAttribute(video, 'autoplay', 'autoplay');
      this.setAttribute(video, 'loop', 'loop');
      video.appendChild(this.createSource("" + baseurl + ".webm", 'video/webm; codecs="vp8.0, vorbis"'));
      video.appendChild(this.createSource("" + baseurl + ".ogv", 'video/ogg; codecs="theora, vorbis"'));
      video.appendChild(this.createSource("" + baseurl + ".mp4", 'video/mp4; codecs="avc1.4D401E, mp4a.40.2"'));
      return video;
    };

    VideoBackground.prototype.setAttribute = function(element, name, value) {
      var attr;
      attr = document.createAttribute(name);
      attr.value = value;
      return element.attributes.setNamedItem(attr);
    };

    VideoBackground.prototype.createSource = function(path, type) {
      var source;
      source = document.createElement('source');
      this.setAttribute(source, 'type', type);
      this.setAttribute(source, 'src', path);
      return source;
    };

    VideoBackground.prototype.detectVideoSupport = function() {
      var basicSupport, element, iOS;
      element = document.createElement('video');
      basicSupport = typeof element.play === 'function' && typeof requestAnimationFrame === 'function';
      iOS = /iPad|iPhone|iPod/.test(navigator.platform);
      return basicSupport && !iOS;
    };

    VideoBackground.prototype.renderToCanvas = function(element, context, dTime) {
      var box, dims, _ref;
      if (dTime == null) {
        dTime = 0;
      }
      if (!this.ready) {
        return (_ref = this.fallback) != null ? _ref.renderToCanvas(element, context, dTime) : void 0;
      }
      dims = this.getDimensions(element);
      box = this.getRenderBox(dims, this.video);
      if (this.debug) {
        console.log(dims, box, element, context, this.video);
        this.debug = false;
      }
      return context.drawImage(this.video, box.source.x, box.source.y, box.dims.width, box.dims.height, 0, 0, dims.vector.values[0], dims.vector.values[1]);
    };

    VideoBackground.prototype.setReady = function() {
      this.ready = true;
      if (this.callback !== null) {
        return this.callback();
      }
    };

    VideoBackground.prototype.setCallback = function(fn) {
      return this.callback = fn;
    };

    return VideoBackground;

  })(this.BackgroundStrategy);

}).call(this);