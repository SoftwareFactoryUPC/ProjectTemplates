//
//  ViewController.m
//  Demo Prueba 1
//
//  Created by josue cadillo on 29/03/15.
//  Copyright (c) 2015 josue cadillo. All rights reserved.
//

#import "ViewController.h"
#import <FBSDKCoreKit/FBSDKCoreKit.h>
#import <FBSDKLoginKit/FBSDKLoginKit.h>
#import <FBSDKShareKit/FBSDKShareKit.h>
#import <FBSDKMessengerShareKit/FBSDKMessengerShareKit.h>

@interface ViewController ()

@end

@implementation ViewController
@synthesize fb;
@synthesize sharefb;
//@synthesize fbSendButton;
@synthesize nameLabel;
@synthesize profileView;


- (void)viewDidLoad {
    [super viewDidLoad];
    // Do any additional setup after loading the view, typically from a nib.
    
    self.fb.readPermissions = @[@"public_profile", @"email", @"user_friends"];
    NSLog(@" %@ ",fb.readPermissions );
    [FBSDKProfile enableUpdatesOnAccessTokenChange:YES];
    if ([FBSDKAccessToken currentAccessToken]) {
        
        [[[FBSDKGraphRequest alloc] initWithGraphPath:@"me" parameters:nil]
         startWithCompletionHandler:^(FBSDKGraphRequestConnection *connection, id result, NSError *error) {
             if (!error) {
                 //Obtener Datos del Usuario
                 NSString *fbid = [result objectForKey:@"id"];
                 NSString * name = [result objectForKey:@"name"];
                 NSString * email = [result objectForKey:@"email"];
                 NSString * firstName = [result objectForKey:@"first_name"];
                 NSString * lastName = [result objectForKey:@"last_name"];
                 
                 NSString* t = [NSString stringWithFormat:@"Bienvenido: %@",name];
                 [nameLabel setText:t];
                 
                 //Compartir lisk
                 NSString* contentUrl = @"http://istore.com.pe";
                 NSString* contentDescription = @"Aqui podras encontrar los mejores ofertas de productos Apple";
                 NSString* contentURLImage = @"http://istore.com.pe/img/banner/portada/bannerportada10.jpg";
                 [profileView setProfileID:fbid];
                 
                 FBSDKShareLinkContent * content = [[FBSDKShareLinkContent alloc] init];
                 content.contentURL = [[NSURL alloc] initWithString:contentUrl];
                 content.contentDescription = contentDescription;
                 content.imageURL = [[NSURL alloc] initWithString:contentURLImage];
                 
                 sharefb.shareContent = content;
                 
                 
                 [nameLabel setHidden:NO];
                 [profileView setHidden:NO];
                 NSLog(@"%@",name);
                 NSLog(@"%@",email);
                 NSLog(@"%@",firstName);
                 NSLog(@"%@",lastName);
                 NSLog(@"ViewDidLoad");
             }
         }];
    }
    
}

-(void)viewWillAppear:(BOOL)animated{
    
    
}

- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

-(void)loginButton:(FBSDKLoginButton *)loginButton didCompleteWithResult:(FBSDKLoginManagerLoginResult *)result error:(NSError *)error
{
    if ([FBSDKAccessToken currentAccessToken]) {
        
        [[[FBSDKGraphRequest alloc] initWithGraphPath:@"me" parameters:nil]
         startWithCompletionHandler:^(FBSDKGraphRequestConnection *connection, id result, NSError *error) {
             if (!error) {
                 
                 //Obtener Datos del Usuario
                 NSString *fbid = [result objectForKey:@"id"];
                 NSString * name = [result objectForKey:@"name"];
                 NSString * email = [result objectForKey:@"email"];
                 NSString * firstName = [result objectForKey:@"first_name"];
                 NSString * lastName = [result objectForKey:@"last_name"];
                 
                 NSString* t = [NSString stringWithFormat:@"Bienvenido: %@",name];
                 [nameLabel setText:t];
                 
                 //Compartir lisk
                 NSString* contentUrl = @"http://istore.com.pe";
                 NSString* contentDescription = @"Aqui podras encontrar los mejores ofertas de productos Apple";
                 NSString* contentURLImage = @"http://istore.com.pe/img/banner/portada/bannerportada10.jpg";
                 [profileView setProfileID:fbid];
                 
                 FBSDKShareLinkContent * content = [[FBSDKShareLinkContent alloc] init];
                 content.contentURL = [[NSURL alloc] initWithString:contentUrl];
                 content.contentDescription = contentDescription;
                 content.imageURL = [[NSURL alloc] initWithString:contentURLImage];
                 
                 sharefb.shareContent = content;
                 
                 [nameLabel setHidden:NO];
                 [profileView setHidden:NO];
                 
                 NSLog(@"%@",name);
                 NSLog(@"%@",email);
                 NSLog(@"%@",firstName);
                 NSLog(@"%@",lastName);
                 
             }
         }];
    }
    return;
}

-(void)loginButtonDidLogOut:(FBSDKLoginButton *)loginButton{
    sharefb.shareContent = nil;
    [nameLabel setHidden:YES];
    [profileView setHidden:YES];
    
}

-(void)sharer:(id<FBSDKSharing>)sharer didFailWithError:(NSError *)error{
}
-(void)sharerDidCancel:(id<FBSDKSharing>)sharer{
}
-(void)sharer:(id<FBSDKSharing>)sharer didCompleteWithResults:(NSDictionary *)results {
    
}

@end
