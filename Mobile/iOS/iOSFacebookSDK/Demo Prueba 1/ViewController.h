//
//  ViewController.h
//  Demo Prueba 1
//
//  Created by josue cadillo on 29/03/15.
//  Copyright (c) 2015 josue cadillo. All rights reserved.
//

#import <UIKit/UIKit.h>
#import <FBSDKCoreKit/FBSDKCoreKit.h>
#import <FBSDKLoginKit/FBSDKLoginKit.h>
#import <FBSDKShareKit/FBSDKShareKit.h>

@interface ViewController : UIViewController <FBSDKLoginButtonDelegate,FBSDKSharingDelegate>

@property (weak,nonatomic) IBOutlet FBSDKLoginButton*fb;
@property (weak,nonatomic) IBOutlet FBSDKShareButton*sharefb;
@property (strong, nonatomic) IBOutlet UILabel *nameLabel;
@property (strong, nonatomic) IBOutlet FBSDKProfilePictureView *profileView;

- (IBAction)action1:(id)sender;


@end

