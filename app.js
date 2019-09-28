/*jshint unused:false */
/*global MovieMasher:true*/
'use strict';
var mm_player;
function mm_update_textarea() {
  var textarea = document.getElementById('mm-textarea');
  textarea.value = JSON.stringify(mm_player.mash, null, '\t');
}
function add_media(id, text = null) {
  
  var size = 0.4;
  // var text = "DEMO";
  var img = document.getElementById('addtext').value
  
  var media = {
    'title': {
      "label": "Title", 
      "type": "theme",
      "id": "com.moviemasher.theme.text",
      "properties": {
        "string": { "type": "string", "value": text },
        "size": { "type": "fontsize", "value": size },
        "x": { "type": "number", "value": 0.1 },
        "y": { "type": "number", "value": 0.3  },
        "color": { "type": "rgba", "value": "red" },
        "shadowcolor": { "type": "rgba", "value": "rgba(0,0,0,0)" },
        "shadowx": { "type": "number", "value": 0 },
        "shadowy": { "type": "number", "value": 0 },
        "background": { "type": "rgb", "value": "white" },
        "fontface": { "type": "font", "value": "com.moviemasher.font.default" }
      },
      "filters": [{
        "id": "color",
        "parameters":[{
          "name": "color",
          "value":"url('media/img/cable.jpg')"
        },{
          "name": "size",
          "value":"mm_dimensions"
        },{
          "name": "duration",
          "value":"mm_duration"
        },{
          "name": "rate",
          "value":"mm_fps"
        }]
      },{
        "id": "drawtext",
        "parameters":[{
          "name": "fontcolor",
          "value":"color"
        },{
          "name": "shadowcolor",
          "value":"shadowcolor"
        },{
          "name": "fontsize",
          "value":"mm_vert(size)"
        },{
          "name": "x",
          "value":"mm_horz(x)"
        },{
          "name": "y",
          "value":"mm_vert(y)"
        },{
          "name": "shadowx",
          "value":"mm_horz(shadowx)"
        },{
          "name": "shadowy",
          "value":"mm_vert(shadowy)"
        },{
          "name": "fontfile",
          "value":"mm_fontfile(fontface)"
        },{
          "name": "textfile",
          "value":"mm_textfile(string)"
        }]
      }]
    },
    'cable': {
      'label': 'Cable',
      'type': 'image',
      'id': 'cable',
      'url': 'media/img/' + img + '.jpg'
    },
    'frog': {
      'label': 'Frog',
      'type': 'image',
      'id': 'frog',
      'url': 'media/img/frog.jpg'
    },
    'globe': {
      'label': 'Globe',
      'type': 'image',
      'id': 'globe',
      'url': 'media/img/globe.jpg'
    }
  };
  if (mm_player) {
    mm_player.add(media[id], 'video');
    mm_update_textarea();
  }
}
function mm_load() {
  var canvas = document.getElementById('mm-canvas');
  if (canvas && MovieMasher && MovieMasher.supported) {
    mm_player = MovieMasher.player();
    // register the filters we use
    MovieMasher.register(MovieMasher.Constant.filter, [
      { "id": "color", "source": "moviemasher/dist/filters/color.js" },
      { "id": "drawtext", "source": "moviemasher/dist/filters/drawtext.js" },
      { "id": "overlay", "source": "moviemasher/dist/filters/overlay.js" },
      { "id": "scale", "source": "moviemasher/dist/filters/scale.js" },
      { "id": "setsar", "source": "moviemasher/dist/filters/setsar.js" }
    ]);
    // register at least a default font, since we're allowing a module that uses fonts
    MovieMasher.register(MovieMasher.Constant.font, {
      "label": "Blackout Two AM",
      "id":"com.moviemasher.font.default",
      "source": "media/font/default.ttf",
      "family":"Blackout Two AM"
    });
    mm_player.canvas_context = canvas.getContext('2d');
    mm_player.mash = {};
    mm_update_textarea();
  }
}
