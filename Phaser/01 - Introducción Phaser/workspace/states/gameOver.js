GameOver=function(game){}

GameOver.prototype=
{
    init:function(score)
    {
        this.score=score;
    },    
    
    create:function()
    {
        //Background
        this.background=this.game.add.tileSprite(0 ,0 , this.game.width, this.game.height, "Background");
        
        //GameOver Text
        var style ={font: '30px Pixel', fill: '#fff', align: 'left'};
        this.gameOverText=this.game.add.text(this.game.world.centerX, this.game.world.centerY-50, "Game Over", style)
        this.gameOverText.anchor.setTo(0.5);
        
        //Score Text
        this.scoreText=this.game.add.text(this.game.world.centerX, this.game.world.centerY,"Score: "+this.score, style)
        this.scoreText.anchor.setTo(0.5);
        
        //Retry Text
        this.retryText=this.game.add.text(this.game.world.centerX, this.game.world.centerY+80, "Retry", style)
        this.retryText.anchor.setTo(0.5);
        this.retryText.inputEnabled=true;
        this.retryText.events.onInputDown.add(function()
        {
            this.game.state.start("Game");
        },this);
    }
}