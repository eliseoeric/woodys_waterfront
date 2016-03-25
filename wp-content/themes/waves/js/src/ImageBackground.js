(function() {
  var __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  this.ImageBackground = (function(_super) {
    var fallbackColor;

    __extends(ImageBackground, _super);

    fallbackColor = '#000';

    ImageBackground.SetFallbackColor = function(colorstring) {
      return fallbackColor = colorstring;
    };

    function ImageBackground(url) {
      ImageBackground.__super__.constructor.call(this);
      this.callback = null;
      if (typeof url === 'string') {
        this.image = this.createImage(url);
      } else if (typeof url === 'object' && url instanceof Array) {
        this.image = this.createSrcSetImage(url);
      } else {
        throw "url provided to ImageBackground constructor must be string or array";
      }
      this.fallback = new SolidBackground(fallbackColor);
    }

    ImageBackground.prototype.renderToCanvas = function(element, context, dTime) {
      var box, dims, _ref;
      if (dTime == null) {
        dTime = 0;
      }
      if (!this.ready) {
        return (_ref = this.fallback) != null ? _ref.renderToCanvas(element, context, dTime) : void 0;
      }
      dims = this.getDimensions(element);
      box = this.getRenderBox(dims, this.imageCanvas);
      return context.drawImage(this.imageContext.canvas, box.source.x, box.source.y, box.dims.width, box.dims.height, 0, 0, dims.vector.values[0], dims.vector.values[1]);
    };

    ImageBackground.prototype.createSrcSetImage = function(values) {
      var img,
        _this = this;
      img = document.createElement('img');
      img.addEventListener('load', function() {
        return _this.setReady();
      });
      if (this.isSrcsetSupported()) {
        img.srcset = values.join(' ');
      } else {
        img.src = values[0];
      }
      return img;
    };

    ImageBackground.prototype.createImage = function(url) {
      var img,
        _this = this;
      img = document.createElement('img');
      img.addEventListener('load', function() {
        return _this.setReady();
      });
      img.src = url;
      return img;
    };

    ImageBackground.prototype.createCanvasSource = function() {
      var dims;
      dims = this.getDimensions(this.image);
      this.imageCanvas = document.createElement('canvas');
      this.imageCanvas.width = dims.width();
      this.imageCanvas.height = dims.height();
      this.imageContext = this.imageCanvas.getContext('2d');
      return this.imageContext.drawImage(this.image, 0, 0);
    };

    ImageBackground.prototype.setReady = function() {
      this.createCanvasSource();
      this.ready = true;
      if (this.callback !== null) {
        return this.callback();
      }
    };

    ImageBackground.prototype.setCallback = function(fn) {
      return this.callback = fn;
    };

    ImageBackground.prototype.isSrcsetSupported = function() {
      var img;
      img = document.createElement('img');
      return typeof img.srcset === 'string';
    };

    return ImageBackground;

  })(this.BackgroundStrategy);

}).call(this);