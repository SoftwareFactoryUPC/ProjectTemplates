//
//  LauchScreen.swift
//  Crud-IOS
//
//  Created by Pedro Pancho on 9/16/16.
//  Copyright © 2016 CRUD. All rights reserved.
//
import UIKit
import Foundation

class LaunchScreen: UIViewController{
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        performSelector(#selector(LaunchScreen.showNavController),withObject: nil,afterDelay:3)
    }
    
    func showNavController()
    {
        performSegueWithIdentifier("LaunchScreen", sender: self)
    }
    
    override func didReceiveMemoryWarning() {
        
        super.didReceiveMemoryWarning()
    }
    
}

 