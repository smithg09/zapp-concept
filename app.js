/*jshint unused:false */
/*global MovieMasher:true*/
'use strict';
var mm_player;
function mm_update_textarea() {
  var textarea = document.getElementById('mm-textarea');
  
  textarea.value = JSON.stringify(mm_player.mash, null, '\t');
}
function add_media(id, route = null) {
  
  // var size = 0.4;
  // var text = "DEMO";
  if (id == "title") {
    if (route == null) {
      var text = document.getElementById('addtext').value;
      var color = document.getElementById('addcolor').value;
      var size = document.getElementById('addsize').value;
    }
    else {
      var text = route;
      var color = "#ffc107";
      var size = '0.2';
    }
  }
  else if (id == "Birthday") {
    var Birthday = document.getElementById('Birthday').value;
  }
  else if (id == "NoteBook") {
    var NoteBook = document.getElementById('NoteBook').value;
  }
  else if (id == "Frog") {
    var Frog = document.getElementById('Frog').value;
  }
  else if (id == "Working") {
    var Working = document.getElementById('Working').value;
  }
  else if (id == "Dentist") {
    var Dentist = document.getElementById('Dentist').value;
  }
  else if (id == "Dussehra") {
    var Dussehra = document.getElementById('Dussehra').value;
  }
  else if (id == "Gandhi") {
    var Gandhi = document.getElementById('Gandhi').value;
  }
  else if (id == "Online") {
    var Online = document.getElementById('Online').value;
  }
  else if (id == "Globe") {
    var Globe = document.getElementById('Globe').value;
  }
  else if (id == "Instagram") {
    var Instagram = document.getElementById('Instagram').value;
  }
  else if (id == "New") {
    var New = document.getElementById('New').value;
  }
  else if (id == "Air") {
    var Air = document.getElementById('Air').value;
  }
  else if (id == "Robot") {
    var Robot = document.getElementById('Robot').value;
  }
  else if (id == "School") {
    var School = document.getElementById('School').value;
  }
  else if (id == "Gif") {
    var Gif = document.getElementById('Gif').value;
  }
  else {
    var defaultimg = route + ".jpg";
  }
   
  var media = {
    'title': {
      "label": "Title", 
      "type": "theme",
      "id": "com.moviemasher.theme.text",
      "properties": {
        "string": { "type": "string", "value": text },
        "size": { "type": "fontsize", "value": size },
        "x": { "type": "number", "value": 0.15 },
        "y": { "type": "number", "value": 0.25  },
        "color": { "type": "rgba", "value": color },
        "shadowcolor": { "type": "rgba", "value": "rgba(0,0,0,0)" },
        "shadowx": { "type": "number", "value": 0 },
        "shadowy": { "type": "number", "value": 0 },
        "background": { "type": "hex", "value": "#FFFFFF"},
        "fontface": { "type": "font", "value": "Proxima Nova Bold" }
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
    'Birthday': {
      'label': 'Birthday',
      'type': 'image',
      'id': 'Birthday',
      'url': 'media/img/' + Birthday
    },
    'NoteBook': {
      'label': 'NoteBook',
      'type': 'image',
      'id': 'NoteBook',
      'url': 'media/img/' + NoteBook
    },
    'Frog': {
      'label': 'Frog',
      'type': 'image',
      'id': 'Frog',
      'url': 'media/img/' + Frog
    },
    'Working': {
      'label': 'Working',
      'type': 'image',
      'id': 'Working',
      'url': 'media/img/' + Working
    },
    'Dentist': {
      'label': 'Dentist',
      'type': 'image',
      'id': 'Dentist',
      'url': 'media/img/' + Dentist
    },
    'Dussehra': {
      'label': 'Dussehra',
      'type': 'image',
      'id': 'Dussehra',
      'url': 'media/img/' + Dussehra
    },
    'Gandhi': {
      'label': 'Gandhi',
      'type': 'image',
      'id': 'Gandhi',
      'url': 'media/img/' + Gandhi
    },
    'Online': {
      'label': 'Online',
      'type': 'image',
      'id': 'Online',
      'url': 'media/img/' + Online
    },
    'Globe': {
      'label': 'Globe',
      'type': 'image',
      'id': 'Globe',
      'url': 'media/img/' + Globe
    },
    'Instagram': {
      'label': 'Instagram',
      'type': 'image',
      'id': 'Instagram',
      'url': 'media/img/' + Instagram
    },
    'New': {
      'label': 'New',
      'type': 'image',
      'id': 'New',
      'url': 'media/img/' + New
    },
    'Air': {
      'label': 'Air',
      'type': 'image',
      'id': 'Air',
      'url': 'media/img/' + Air
    },
    'Robot': {
      'label': 'Robot',
      'type': 'image',
      'id': 'Robot',
      'url': 'media/img/' + Robot
    },
    'School': {
      'label': 'School',
      'type': 'image',
      'id': 'School',
      'url': 'media/img/' + School
    },
    'cable': {
      'label': 'Cable',
      'type': 'image',
      'id': 'cable',
      'url': 'media/img/' + defaultimg
    },
    'Gif': {
      'label': 'Gif',
      'type': 'image',
      'id': 'Gif',
      'url': 'media/img/' + Gif
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
        "label": "Proxima Nova",
        "id": "Proxima Nova Bold",
        "source": "media/font/Proxima Nova Bold.ttf",
        "family": "Proxima Nova"
    });
    mm_player.canvas_context = canvas.getContext('2d');
    mm_player.mash = {};
    mm_update_textarea();
  }
}
