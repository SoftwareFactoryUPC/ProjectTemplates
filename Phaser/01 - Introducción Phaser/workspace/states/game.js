Game=function(game){}

Game.prototype=
{
    create:function()
    {
        //Misc
        this.game.physics.startSystem(Phaser.Physics.ARCADE);
        this.game.physics.arcade.gravity.y=1300;
        this.gameOver=false;
        
        //Background
        this.background=this.game.add.tileSprite(0 ,0 , this.game.width, this.game.height, "Background");
        this.background.autoScroll(-40,0);
        
        //Player
        var playerData={x:this.game.width*0.25, y:this.game.world.centerY, key:"Player"};
        this.player=new Player(this, playerData);
        
        //Walls
        this.activeWall=new Wall(this);
        this.passiveWall=null;
        this.wallTimer=0;
    },
    
    update:function()
    {
        //Timer Loop
        if(!this.gameOver)
        {
            this.wallTimer+=this.game.time.elapsed; //Returns time elapsed since last update run (milliseconds)
            if(this.wallTimer>=1500)
            {
                this.wallTimer=0;
                this.spawnWall();
            }
        }
        
        //Collisions
        this.game.physics.arcade.collide(this.player, this.activeWall, this.endGame, null, this);
        
        //Score
        if(this.player.x>this.activeWall.children[0].x+this.activeWall.children[0].width)
        {
            this.activeWall=this.passiveWall;
            this.player.score+=1;
        }
    },
    
    spawnWall:function()
    {
        this.passiveWall=new Wall(this);
    },
    
    endGame:function()
    {
        this.gameOver=true;
        this.game.input.onDown.removeAll();
        this.background.stopScroll();
        this.activeWall.freeze();
        if(this.passiveWall)
        {
            this.passiveWall.freeze();
        }
        this.player.freeze();
        this.player.body.allowGravity=false;
        this.game.add.tween(this.player).to({angle:-180},300,null,true).onComplete.add(function() {
            this.game.add.tween(this.player).to({y:this.game.height+this.player.height},750,null,true).onComplete.add(function(){
                this.game.state.start("GameOver", true, false, this.player.score);
            },this);
        },this);
    }
}