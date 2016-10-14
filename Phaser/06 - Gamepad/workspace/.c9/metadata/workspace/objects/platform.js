{"changed":true,"filter":false,"title":"platform.js","tooltip":"/objects/platform.js","value":"Platform=function(state, data)\n{\n    //Misc\n    this.state=state;\n    this.game=state.game;\n    \n    //Create\n    Phaser.Sprite.call(this, this.game, data.x, data.y, null);\n    this.game.add.existing(this);\n    \n    this.init();\n}\n\nPlatform.prototype=Object.create(Phaser.Sprite.prototype);\nPlatform.prototype.constructor=Platform;\n\nPlatform.prototype.init=function()\n{\n    this.game.physics.arcade.enable(this);\n    this.body.allowGravity=false;\n    this.body.immovable=true;\n    this.body.setSize(120, 30, 0, 0);\n    this.body.velocity.x=-250;\n}\n\nPlatform.prototype.update=function()\n{\n    if(this.x+this.body.width<0)\n    {\n        this.kill();\n    }\n}","undoManager":{"mark":96,"position":100,"stack":[[{"start":{"row":22,"column":7},"end":{"row":22,"column":8},"action":"insert","lines":["t"],"id":190}],[{"start":{"row":22,"column":8},"end":{"row":22,"column":9},"action":"insert","lines":["h"],"id":191}],[{"start":{"row":22,"column":9},"end":{"row":22,"column":10},"action":"insert","lines":["i"],"id":192}],[{"start":{"row":22,"column":10},"end":{"row":22,"column":11},"action":"insert","lines":["s"],"id":193}],[{"start":{"row":22,"column":11},"end":{"row":22,"column":12},"action":"insert","lines":["."],"id":194}],[{"start":{"row":22,"column":12},"end":{"row":22,"column":13},"action":"insert","lines":["x"],"id":195}],[{"start":{"row":13,"column":30},"end":{"row":14,"column":30},"action":"remove","lines":["","    this.anchor.setTo(0, 0.5);"],"id":196}],[{"start":{"row":21,"column":13},"end":{"row":21,"column":14},"action":"insert","lines":["+"],"id":197}],[{"start":{"row":21,"column":14},"end":{"row":21,"column":15},"action":"insert","lines":["t"],"id":198}],[{"start":{"row":21,"column":15},"end":{"row":21,"column":16},"action":"insert","lines":["h"],"id":199}],[{"start":{"row":21,"column":16},"end":{"row":21,"column":17},"action":"insert","lines":["i"],"id":200}],[{"start":{"row":21,"column":17},"end":{"row":21,"column":18},"action":"insert","lines":["s"],"id":201}],[{"start":{"row":21,"column":18},"end":{"row":21,"column":19},"action":"insert","lines":["."],"id":202}],[{"start":{"row":21,"column":19},"end":{"row":21,"column":20},"action":"insert","lines":["w"],"id":203}],[{"start":{"row":21,"column":20},"end":{"row":21,"column":21},"action":"insert","lines":["i"],"id":204}],[{"start":{"row":21,"column":21},"end":{"row":21,"column":22},"action":"insert","lines":["d"],"id":205}],[{"start":{"row":21,"column":19},"end":{"row":21,"column":22},"action":"remove","lines":["wid"],"id":206},{"start":{"row":21,"column":19},"end":{"row":21,"column":24},"action":"insert","lines":["width"]}],[{"start":{"row":21,"column":24},"end":{"row":21,"column":25},"action":"insert","lines":[";"],"id":207}],[{"start":{"row":21,"column":24},"end":{"row":21,"column":25},"action":"remove","lines":[";"],"id":208}],[{"start":{"row":21,"column":24},"end":{"row":21,"column":25},"action":"insert","lines":["<"],"id":209}],[{"start":{"row":21,"column":25},"end":{"row":21,"column":27},"action":"insert","lines":["''"],"id":210}],[{"start":{"row":21,"column":25},"end":{"row":21,"column":27},"action":"remove","lines":["''"],"id":211}],[{"start":{"row":21,"column":25},"end":{"row":21,"column":26},"action":"insert","lines":["0"],"id":212}],[{"start":{"row":21,"column":27},"end":{"row":22,"column":0},"action":"insert","lines":["",""],"id":213},{"start":{"row":22,"column":0},"end":{"row":22,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":22,"column":4},"end":{"row":22,"column":5},"action":"insert","lines":["h"],"id":214}],[{"start":{"row":22,"column":5},"end":{"row":22,"column":6},"action":"insert","lines":["i"],"id":215}],[{"start":{"row":22,"column":5},"end":{"row":22,"column":6},"action":"remove","lines":["i"],"id":216}],[{"start":{"row":22,"column":4},"end":{"row":22,"column":5},"action":"remove","lines":["h"],"id":217}],[{"start":{"row":22,"column":4},"end":{"row":22,"column":8},"action":"insert","lines":["    "],"id":218}],[{"start":{"row":22,"column":4},"end":{"row":22,"column":8},"action":"remove","lines":["    "],"id":219}],[{"start":{"row":22,"column":0},"end":{"row":22,"column":4},"action":"remove","lines":["    "],"id":220}],[{"start":{"row":21,"column":27},"end":{"row":22,"column":0},"action":"remove","lines":["",""],"id":221}],[{"start":{"row":21,"column":27},"end":{"row":22,"column":0},"action":"insert","lines":["",""],"id":222},{"start":{"row":22,"column":0},"end":{"row":22,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":22,"column":4},"end":{"row":22,"column":5},"action":"insert","lines":["{"],"id":223}],[{"start":{"row":22,"column":5},"end":{"row":24,"column":5},"action":"insert","lines":["","        ","    }"],"id":224}],[{"start":{"row":23,"column":8},"end":{"row":23,"column":9},"action":"insert","lines":["t"],"id":225}],[{"start":{"row":23,"column":9},"end":{"row":23,"column":10},"action":"insert","lines":["h"],"id":226}],[{"start":{"row":23,"column":10},"end":{"row":23,"column":11},"action":"insert","lines":["i"],"id":227}],[{"start":{"row":23,"column":11},"end":{"row":23,"column":12},"action":"insert","lines":["s"],"id":228}],[{"start":{"row":23,"column":12},"end":{"row":23,"column":13},"action":"insert","lines":["."],"id":229}],[{"start":{"row":23,"column":13},"end":{"row":23,"column":14},"action":"insert","lines":["k"],"id":230}],[{"start":{"row":23,"column":14},"end":{"row":23,"column":15},"action":"insert","lines":["i"],"id":231}],[{"start":{"row":23,"column":15},"end":{"row":23,"column":16},"action":"insert","lines":["l"],"id":232}],[{"start":{"row":23,"column":16},"end":{"row":23,"column":17},"action":"insert","lines":["l"],"id":233}],[{"start":{"row":23,"column":17},"end":{"row":23,"column":19},"action":"insert","lines":["()"],"id":234}],[{"start":{"row":23,"column":19},"end":{"row":23,"column":20},"action":"insert","lines":[";"],"id":235}],[{"start":{"row":21,"column":19},"end":{"row":21,"column":20},"action":"insert","lines":["b"],"id":236}],[{"start":{"row":21,"column":20},"end":{"row":21,"column":21},"action":"insert","lines":["o"],"id":237}],[{"start":{"row":21,"column":21},"end":{"row":21,"column":22},"action":"insert","lines":["d"],"id":238}],[{"start":{"row":21,"column":22},"end":{"row":21,"column":23},"action":"insert","lines":["y"],"id":239}],[{"start":{"row":21,"column":23},"end":{"row":21,"column":24},"action":"insert","lines":["."],"id":240}],[{"start":{"row":18,"column":0},"end":{"row":19,"column":0},"action":"insert","lines":["",""],"id":241}],[{"start":{"row":19,"column":0},"end":{"row":20,"column":0},"action":"insert","lines":["",""],"id":242}],[{"start":{"row":19,"column":0},"end":{"row":19,"column":25},"action":"insert","lines":["Platform.prototype.update"],"id":243}],[{"start":{"row":19,"column":19},"end":{"row":19,"column":25},"action":"remove","lines":["update"],"id":244},{"start":{"row":19,"column":19},"end":{"row":19,"column":20},"action":"insert","lines":["i"]}],[{"start":{"row":19,"column":20},"end":{"row":19,"column":21},"action":"insert","lines":["n"],"id":245}],[{"start":{"row":19,"column":21},"end":{"row":19,"column":22},"action":"insert","lines":["i"],"id":246}],[{"start":{"row":19,"column":22},"end":{"row":19,"column":23},"action":"insert","lines":["t"],"id":247}],[{"start":{"row":19,"column":23},"end":{"row":19,"column":24},"action":"insert","lines":["="],"id":248}],[{"start":{"row":19,"column":24},"end":{"row":19,"column":25},"action":"insert","lines":["f"],"id":249}],[{"start":{"row":19,"column":25},"end":{"row":19,"column":26},"action":"insert","lines":["u"],"id":250}],[{"start":{"row":19,"column":26},"end":{"row":19,"column":27},"action":"insert","lines":["n"],"id":251}],[{"start":{"row":19,"column":27},"end":{"row":19,"column":28},"action":"insert","lines":["c"],"id":252}],[{"start":{"row":19,"column":28},"end":{"row":19,"column":29},"action":"insert","lines":["t"],"id":253}],[{"start":{"row":19,"column":29},"end":{"row":19,"column":30},"action":"insert","lines":["i"],"id":254}],[{"start":{"row":19,"column":30},"end":{"row":19,"column":31},"action":"insert","lines":["o"],"id":255}],[{"start":{"row":19,"column":31},"end":{"row":19,"column":32},"action":"insert","lines":["n"],"id":256}],[{"start":{"row":19,"column":32},"end":{"row":19,"column":33},"action":"insert","lines":[")"],"id":257}],[{"start":{"row":19,"column":32},"end":{"row":19,"column":33},"action":"remove","lines":[")"],"id":258}],[{"start":{"row":19,"column":32},"end":{"row":19,"column":33},"action":"insert","lines":[")"],"id":259}],[{"start":{"row":19,"column":32},"end":{"row":19,"column":33},"action":"remove","lines":[")"],"id":260}],[{"start":{"row":19,"column":32},"end":{"row":19,"column":34},"action":"insert","lines":["()"],"id":261}],[{"start":{"row":19,"column":34},"end":{"row":20,"column":0},"action":"insert","lines":["",""],"id":262}],[{"start":{"row":20,"column":0},"end":{"row":20,"column":1},"action":"insert","lines":["{"],"id":263}],[{"start":{"row":20,"column":1},"end":{"row":22,"column":1},"action":"insert","lines":["","    ","}"],"id":264}],[{"start":{"row":9,"column":4},"end":{"row":13,"column":30},"action":"remove","lines":["this.game.physics.arcade.enable(this);","    this.body.allowGravity=false;","    this.body.immovable=true;","    this.body.setSize(100, 30, 0, 0);","    this.body.velocity.x=-250;"],"id":265}],[{"start":{"row":17,"column":4},"end":{"row":21,"column":30},"action":"insert","lines":["this.game.physics.arcade.enable(this);","    this.body.allowGravity=false;","    this.body.immovable=true;","    this.body.setSize(100, 30, 0, 0);","    this.body.velocity.x=-250;"],"id":266}],[{"start":{"row":17,"column":4},"end":{"row":17,"column":42},"action":"remove","lines":["this.game.physics.arcade.enable(this);"],"id":267}],[{"start":{"row":9,"column":4},"end":{"row":9,"column":42},"action":"insert","lines":["this.game.physics.arcade.enable(this);"],"id":268}],[{"start":{"row":9,"column":4},"end":{"row":9,"column":42},"action":"remove","lines":["this.game.physics.arcade.enable(this);"],"id":270}],[{"start":{"row":17,"column":4},"end":{"row":17,"column":42},"action":"insert","lines":["this.game.physics.arcade.enable(this);"],"id":271}],[{"start":{"row":9,"column":4},"end":{"row":10,"column":0},"action":"insert","lines":["",""],"id":272},{"start":{"row":10,"column":0},"end":{"row":10,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":10,"column":4},"end":{"row":10,"column":5},"action":"insert","lines":["t"],"id":273}],[{"start":{"row":10,"column":5},"end":{"row":10,"column":6},"action":"insert","lines":["h"],"id":274}],[{"start":{"row":10,"column":6},"end":{"row":10,"column":7},"action":"insert","lines":["i"],"id":275}],[{"start":{"row":10,"column":7},"end":{"row":10,"column":8},"action":"insert","lines":["s"],"id":276}],[{"start":{"row":10,"column":8},"end":{"row":10,"column":9},"action":"insert","lines":["."],"id":277}],[{"start":{"row":10,"column":9},"end":{"row":10,"column":10},"action":"insert","lines":["i"],"id":278}],[{"start":{"row":10,"column":10},"end":{"row":10,"column":11},"action":"insert","lines":["i"],"id":279}],[{"start":{"row":10,"column":10},"end":{"row":10,"column":11},"action":"remove","lines":["i"],"id":280}],[{"start":{"row":10,"column":10},"end":{"row":10,"column":11},"action":"insert","lines":["n"],"id":281}],[{"start":{"row":10,"column":11},"end":{"row":10,"column":12},"action":"insert","lines":["i"],"id":282}],[{"start":{"row":10,"column":9},"end":{"row":10,"column":12},"action":"remove","lines":["ini"],"id":283},{"start":{"row":10,"column":9},"end":{"row":10,"column":15},"action":"insert","lines":["init()"]}],[{"start":{"row":10,"column":14},"end":{"row":10,"column":15},"action":"insert","lines":[";"],"id":284}],[{"start":{"row":10,"column":14},"end":{"row":10,"column":15},"action":"remove","lines":[";"],"id":285}],[{"start":{"row":10,"column":15},"end":{"row":10,"column":16},"action":"insert","lines":[";"],"id":286}],[{"start":{"row":21,"column":23},"end":{"row":21,"column":24},"action":"remove","lines":["0"],"id":287},{"start":{"row":21,"column":23},"end":{"row":21,"column":24},"action":"insert","lines":["2"]}],[{"start":{"row":31,"column":1},"end":{"row":32,"column":0},"action":"insert","lines":["",""],"id":288}],[{"start":{"row":32,"column":0},"end":{"row":33,"column":0},"action":"insert","lines":["",""],"id":289}],[{"start":{"row":32,"column":0},"end":{"row":33,"column":0},"action":"remove","lines":["",""],"id":290}],[{"start":{"row":31,"column":1},"end":{"row":32,"column":0},"action":"remove","lines":["",""],"id":291}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":31,"column":1},"end":{"row":31,"column":1},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":3,"state":"start","mode":"ace/mode/javascript"}},"timestamp":1475276527393}