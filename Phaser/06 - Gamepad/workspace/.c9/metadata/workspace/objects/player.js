{"filter":false,"title":"player.js","tooltip":"/objects/player.js","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":20,"column":103},"end":{"row":20,"column":104},"action":"remove","lines":["2"],"id":811}],[{"start":{"row":20,"column":103},"end":{"row":20,"column":104},"action":"remove","lines":["4"],"id":812}],[{"start":{"row":20,"column":103},"end":{"row":20,"column":104},"action":"insert","lines":["3"],"id":813}],[{"start":{"row":20,"column":104},"end":{"row":20,"column":105},"action":"insert","lines":["0"],"id":814}],[{"start":{"row":10,"column":42},"end":{"row":11,"column":0},"action":"insert","lines":["",""],"id":815},{"start":{"row":11,"column":0},"end":{"row":11,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":11,"column":4},"end":{"row":12,"column":0},"action":"insert","lines":["",""],"id":816},{"start":{"row":12,"column":0},"end":{"row":12,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":12,"column":4},"end":{"row":13,"column":48},"action":"insert","lines":["this.cursors=this.game.input.keyboard.createCursorKeys();","    this.cursors.up.onDown.add(this.jump, this);"],"id":817}],[{"start":{"row":11,"column":4},"end":{"row":12,"column":0},"action":"insert","lines":["",""],"id":818},{"start":{"row":12,"column":0},"end":{"row":12,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":12,"column":4},"end":{"row":12,"column":5},"action":"insert","lines":["-"],"id":819}],[{"start":{"row":12,"column":5},"end":{"row":12,"column":6},"action":"insert","lines":["-"],"id":820}],[{"start":{"row":12,"column":5},"end":{"row":12,"column":6},"action":"remove","lines":["-"],"id":821}],[{"start":{"row":12,"column":4},"end":{"row":12,"column":5},"action":"remove","lines":["-"],"id":822}],[{"start":{"row":12,"column":4},"end":{"row":12,"column":5},"action":"insert","lines":["/"],"id":823}],[{"start":{"row":12,"column":5},"end":{"row":12,"column":6},"action":"insert","lines":["/"],"id":824}],[{"start":{"row":12,"column":6},"end":{"row":12,"column":7},"action":"insert","lines":["T"],"id":825}],[{"start":{"row":12,"column":7},"end":{"row":12,"column":8},"action":"insert","lines":["E"],"id":826}],[{"start":{"row":12,"column":8},"end":{"row":12,"column":9},"action":"insert","lines":["M"],"id":827}],[{"start":{"row":12,"column":9},"end":{"row":12,"column":10},"action":"insert","lines":["P"],"id":828}],[{"start":{"row":56,"column":9},"end":{"row":57,"column":0},"action":"insert","lines":["",""],"id":829},{"start":{"row":57,"column":0},"end":{"row":57,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":57,"column":8},"end":{"row":58,"column":0},"action":"insert","lines":["",""],"id":830},{"start":{"row":58,"column":0},"end":{"row":58,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":58,"column":8},"end":{"row":58,"column":32},"action":"insert","lines":["this.cursors.left.isDown"],"id":831}],[{"start":{"row":58,"column":8},"end":{"row":58,"column":32},"action":"remove","lines":["this.cursors.left.isDown"],"id":832}],[{"start":{"row":56,"column":9},"end":{"row":58,"column":8},"action":"remove","lines":["","        ","        "],"id":833}],[{"start":{"row":67,"column":5},"end":{"row":68,"column":0},"action":"insert","lines":["",""],"id":834},{"start":{"row":68,"column":0},"end":{"row":68,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":68,"column":4},"end":{"row":69,"column":0},"action":"insert","lines":["",""],"id":835},{"start":{"row":69,"column":0},"end":{"row":69,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":69,"column":4},"end":{"row":69,"column":28},"action":"insert","lines":["this.cursors.left.isDown"],"id":836}],[{"start":{"row":67,"column":5},"end":{"row":68,"column":0},"action":"insert","lines":["",""],"id":837},{"start":{"row":68,"column":0},"end":{"row":68,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":68,"column":4},"end":{"row":68,"column":5},"action":"insert","lines":["e"],"id":838}],[{"start":{"row":68,"column":5},"end":{"row":68,"column":6},"action":"insert","lines":["l"],"id":839}],[{"start":{"row":68,"column":6},"end":{"row":68,"column":7},"action":"insert","lines":["s"],"id":840}],[{"start":{"row":68,"column":7},"end":{"row":68,"column":8},"action":"insert","lines":["e"],"id":841}],[{"start":{"row":68,"column":8},"end":{"row":69,"column":0},"action":"insert","lines":["",""],"id":842},{"start":{"row":69,"column":0},"end":{"row":69,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":69,"column":4},"end":{"row":69,"column":5},"action":"insert","lines":["{"],"id":843}],[{"start":{"row":69,"column":5},"end":{"row":71,"column":5},"action":"insert","lines":["","        ","    }"],"id":844}],[{"start":{"row":70,"column":8},"end":{"row":84,"column":9},"action":"insert","lines":["if(leftStickX && this.currentState!=\"Attacking\")","        {","            if (leftStickX>0)","            {","                this.move(1);","            }","            else","            {","                this.move(-1);","            }","        }","        else","        {","            this.stop();","        }"],"id":845}],[{"start":{"row":69,"column":5},"end":{"row":71,"column":9},"action":"remove","lines":["","        if(leftStickX && this.currentState!=\"Attacking\")","        {"],"id":846}],[{"start":{"row":77,"column":13},"end":{"row":78,"column":9},"action":"remove","lines":["","        }"],"id":847}],[{"start":{"row":70,"column":0},"end":{"row":70,"column":4},"action":"remove","lines":["    "],"id":848},{"start":{"row":71,"column":0},"end":{"row":71,"column":4},"action":"remove","lines":["    "]},{"start":{"row":72,"column":0},"end":{"row":72,"column":4},"action":"remove","lines":["    "]},{"start":{"row":73,"column":0},"end":{"row":73,"column":4},"action":"remove","lines":["    "]},{"start":{"row":74,"column":0},"end":{"row":74,"column":4},"action":"remove","lines":["    "]},{"start":{"row":75,"column":0},"end":{"row":75,"column":4},"action":"remove","lines":["    "]},{"start":{"row":76,"column":0},"end":{"row":76,"column":4},"action":"remove","lines":["    "]},{"start":{"row":77,"column":0},"end":{"row":77,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":74,"column":12},"end":{"row":74,"column":13},"action":"insert","lines":[" "],"id":849}],[{"start":{"row":74,"column":13},"end":{"row":74,"column":14},"action":"insert","lines":["i"],"id":850}],[{"start":{"row":74,"column":14},"end":{"row":74,"column":15},"action":"insert","lines":["f"],"id":851}],[{"start":{"row":74,"column":15},"end":{"row":74,"column":17},"action":"insert","lines":["()"],"id":852}],[{"start":{"row":84,"column":4},"end":{"row":84,"column":28},"action":"remove","lines":["this.cursors.left.isDown"],"id":853}],[{"start":{"row":74,"column":16},"end":{"row":74,"column":40},"action":"insert","lines":["this.cursors.left.isDown"],"id":854}],[{"start":{"row":82,"column":5},"end":{"row":84,"column":4},"action":"remove","lines":["","    ","    "],"id":855}],[{"start":{"row":70,"column":12},"end":{"row":70,"column":24},"action":"remove","lines":["leftStickX>0"],"id":856},{"start":{"row":70,"column":12},"end":{"row":70,"column":36},"action":"insert","lines":["this.cursors.left.isDown"]}],[{"start":{"row":70,"column":25},"end":{"row":70,"column":29},"action":"remove","lines":["left"],"id":857},{"start":{"row":70,"column":25},"end":{"row":70,"column":26},"action":"insert","lines":["r"]}],[{"start":{"row":70,"column":26},"end":{"row":70,"column":27},"action":"insert","lines":["i"],"id":858}],[{"start":{"row":70,"column":27},"end":{"row":70,"column":28},"action":"insert","lines":["g"],"id":859}],[{"start":{"row":70,"column":28},"end":{"row":70,"column":29},"action":"insert","lines":["h"],"id":860}],[{"start":{"row":70,"column":29},"end":{"row":70,"column":30},"action":"insert","lines":["t"],"id":861}],[{"start":{"row":69,"column":5},"end":{"row":70,"column":0},"action":"insert","lines":["",""],"id":862},{"start":{"row":70,"column":0},"end":{"row":70,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":70,"column":8},"end":{"row":70,"column":9},"action":"insert","lines":["/"],"id":863}],[{"start":{"row":70,"column":9},"end":{"row":70,"column":10},"action":"insert","lines":["/"],"id":864}],[{"start":{"row":70,"column":10},"end":{"row":70,"column":11},"action":"insert","lines":["T"],"id":865}],[{"start":{"row":70,"column":11},"end":{"row":70,"column":12},"action":"insert","lines":["E"],"id":866}],[{"start":{"row":70,"column":12},"end":{"row":70,"column":13},"action":"insert","lines":["M"],"id":867}],[{"start":{"row":70,"column":13},"end":{"row":70,"column":14},"action":"insert","lines":["P"],"id":868}],[{"start":{"row":117,"column":30},"end":{"row":117,"column":31},"action":"remove","lines":["3"],"id":869},{"start":{"row":117,"column":30},"end":{"row":117,"column":31},"action":"insert","lines":["5"]}],[{"start":{"row":36,"column":1},"end":{"row":37,"column":0},"action":"insert","lines":["",""],"id":870},{"start":{"row":37,"column":0},"end":{"row":37,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":37,"column":4},"end":{"row":38,"column":0},"action":"insert","lines":["",""],"id":871},{"start":{"row":38,"column":0},"end":{"row":38,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":37,"column":4},"end":{"row":40,"column":5},"action":"insert","lines":["if(this.x-this.width>this.map.widthInPixels || this.x-this.width<0 || this.y-this.height>this.map.heightInPixels)","    {","        this.game.state.start(\"Game\");","    }"],"id":872}],[{"start":{"row":37,"column":24},"end":{"row":37,"column":25},"action":"insert","lines":["/"],"id":873}],[{"start":{"row":37,"column":24},"end":{"row":37,"column":25},"action":"remove","lines":["/"],"id":874}],[{"start":{"row":37,"column":24},"end":{"row":37,"column":25},"action":"insert","lines":["*"],"id":875}],[{"start":{"row":37,"column":25},"end":{"row":37,"column":26},"action":"insert","lines":["0"],"id":876}],[{"start":{"row":37,"column":26},"end":{"row":37,"column":27},"action":"insert","lines":["."],"id":877}],[{"start":{"row":37,"column":27},"end":{"row":37,"column":28},"action":"insert","lines":["5"],"id":878}],[{"start":{"row":37,"column":13},"end":{"row":37,"column":14},"action":"remove","lines":["-"],"id":879}],[{"start":{"row":37,"column":13},"end":{"row":37,"column":14},"action":"insert","lines":["+"],"id":880}],[{"start":{"row":37,"column":28},"end":{"row":37,"column":29},"action":"remove","lines":[">"],"id":881}],[{"start":{"row":37,"column":28},"end":{"row":37,"column":29},"action":"insert","lines":["<"],"id":882}],[{"start":{"row":37,"column":29},"end":{"row":37,"column":51},"action":"remove","lines":["this.map.widthInPixels"],"id":883},{"start":{"row":37,"column":29},"end":{"row":37,"column":30},"action":"insert","lines":["0"]}],[{"start":{"row":37,"column":51},"end":{"row":37,"column":53},"action":"remove","lines":["<0"],"id":884},{"start":{"row":37,"column":51},"end":{"row":37,"column":52},"action":"insert","lines":[">"]}],[{"start":{"row":37,"column":52},"end":{"row":37,"column":53},"action":"insert","lines":["t"],"id":885}],[{"start":{"row":37,"column":53},"end":{"row":37,"column":54},"action":"insert","lines":["h"],"id":886}],[{"start":{"row":37,"column":54},"end":{"row":37,"column":55},"action":"insert","lines":["i"],"id":887}],[{"start":{"row":37,"column":55},"end":{"row":37,"column":56},"action":"insert","lines":["s"],"id":888}],[{"start":{"row":37,"column":56},"end":{"row":37,"column":57},"action":"insert","lines":["."],"id":889}],[{"start":{"row":37,"column":57},"end":{"row":37,"column":58},"action":"insert","lines":["g"],"id":890}],[{"start":{"row":37,"column":58},"end":{"row":37,"column":59},"action":"insert","lines":["a"],"id":891}],[{"start":{"row":37,"column":59},"end":{"row":37,"column":60},"action":"insert","lines":["m"],"id":892}],[{"start":{"row":37,"column":60},"end":{"row":37,"column":61},"action":"insert","lines":["e"],"id":893}],[{"start":{"row":37,"column":61},"end":{"row":37,"column":62},"action":"insert","lines":["."],"id":894}],[{"start":{"row":37,"column":62},"end":{"row":37,"column":63},"action":"insert","lines":["w"],"id":895}],[{"start":{"row":37,"column":63},"end":{"row":37,"column":64},"action":"insert","lines":["i"],"id":896}],[{"start":{"row":37,"column":62},"end":{"row":37,"column":64},"action":"remove","lines":["wi"],"id":897},{"start":{"row":37,"column":62},"end":{"row":37,"column":67},"action":"insert","lines":["width"]}],[{"start":{"row":37,"column":77},"end":{"row":37,"column":89},"action":"remove","lines":["-this.height"],"id":898}],[{"start":{"row":37,"column":83},"end":{"row":37,"column":86},"action":"remove","lines":["map"],"id":899},{"start":{"row":37,"column":83},"end":{"row":37,"column":84},"action":"insert","lines":["g"]}],[{"start":{"row":37,"column":84},"end":{"row":37,"column":85},"action":"insert","lines":["a"],"id":900}],[{"start":{"row":37,"column":85},"end":{"row":37,"column":86},"action":"insert","lines":["m"],"id":901}],[{"start":{"row":37,"column":86},"end":{"row":37,"column":87},"action":"insert","lines":["e"],"id":902}],[{"start":{"row":37,"column":94},"end":{"row":37,"column":102},"action":"remove","lines":["InPixels"],"id":903}],[{"start":{"row":13,"column":4},"end":{"row":13,"column":5},"action":"insert","lines":["/"],"id":906}],[{"start":{"row":13,"column":5},"end":{"row":13,"column":6},"action":"insert","lines":["/"],"id":907}],[{"start":{"row":14,"column":4},"end":{"row":14,"column":5},"action":"insert","lines":["/"],"id":908}],[{"start":{"row":14,"column":5},"end":{"row":14,"column":6},"action":"insert","lines":["/"],"id":909}],[{"start":{"row":88,"column":4},"end":{"row":88,"column":5},"action":"insert","lines":["/"],"id":910},{"start":{"row":87,"column":4},"end":{"row":87,"column":5},"action":"insert","lines":["/"]},{"start":{"row":86,"column":4},"end":{"row":86,"column":5},"action":"insert","lines":["/"]},{"start":{"row":85,"column":4},"end":{"row":85,"column":5},"action":"insert","lines":["/"]},{"start":{"row":84,"column":4},"end":{"row":84,"column":5},"action":"insert","lines":["/"]},{"start":{"row":83,"column":4},"end":{"row":83,"column":5},"action":"insert","lines":["/"]},{"start":{"row":82,"column":4},"end":{"row":82,"column":5},"action":"insert","lines":["/"]},{"start":{"row":81,"column":4},"end":{"row":81,"column":5},"action":"insert","lines":["/"]},{"start":{"row":80,"column":4},"end":{"row":80,"column":5},"action":"insert","lines":["/"]},{"start":{"row":79,"column":4},"end":{"row":79,"column":5},"action":"insert","lines":["/"]},{"start":{"row":78,"column":4},"end":{"row":78,"column":5},"action":"insert","lines":["/"]},{"start":{"row":77,"column":4},"end":{"row":77,"column":5},"action":"insert","lines":["/"]},{"start":{"row":76,"column":4},"end":{"row":76,"column":5},"action":"insert","lines":["/"]},{"start":{"row":75,"column":4},"end":{"row":75,"column":5},"action":"insert","lines":["/"]},{"start":{"row":74,"column":4},"end":{"row":74,"column":5},"action":"insert","lines":["/"]},{"start":{"row":73,"column":4},"end":{"row":73,"column":5},"action":"insert","lines":["/"]}],[{"start":{"row":88,"column":5},"end":{"row":88,"column":6},"action":"insert","lines":["/"],"id":911},{"start":{"row":87,"column":5},"end":{"row":87,"column":6},"action":"insert","lines":["/"]},{"start":{"row":86,"column":5},"end":{"row":86,"column":6},"action":"insert","lines":["/"]},{"start":{"row":85,"column":5},"end":{"row":85,"column":6},"action":"insert","lines":["/"]},{"start":{"row":84,"column":5},"end":{"row":84,"column":6},"action":"insert","lines":["/"]},{"start":{"row":83,"column":5},"end":{"row":83,"column":6},"action":"insert","lines":["/"]},{"start":{"row":82,"column":5},"end":{"row":82,"column":6},"action":"insert","lines":["/"]},{"start":{"row":81,"column":5},"end":{"row":81,"column":6},"action":"insert","lines":["/"]},{"start":{"row":80,"column":5},"end":{"row":80,"column":6},"action":"insert","lines":["/"]},{"start":{"row":79,"column":5},"end":{"row":79,"column":6},"action":"insert","lines":["/"]},{"start":{"row":78,"column":5},"end":{"row":78,"column":6},"action":"insert","lines":["/"]},{"start":{"row":77,"column":5},"end":{"row":77,"column":6},"action":"insert","lines":["/"]},{"start":{"row":76,"column":5},"end":{"row":76,"column":6},"action":"insert","lines":["/"]},{"start":{"row":75,"column":5},"end":{"row":75,"column":6},"action":"insert","lines":["/"]},{"start":{"row":74,"column":5},"end":{"row":74,"column":6},"action":"insert","lines":["/"]},{"start":{"row":73,"column":5},"end":{"row":73,"column":6},"action":"insert","lines":["/"]}],[{"start":{"row":122,"column":30},"end":{"row":122,"column":31},"action":"remove","lines":["5"],"id":914}],[{"start":{"row":122,"column":30},"end":{"row":122,"column":31},"action":"insert","lines":["3"],"id":915}]]},"ace":{"folds":[],"scrolltop":1560,"scrollleft":0,"selection":{"start":{"row":122,"column":31},"end":{"row":122,"column":31},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1475720146244,"hash":"6f58ca8ddabcfc3008ee755486d2a6d3a06f64c0"}