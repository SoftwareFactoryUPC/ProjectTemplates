//
//  ViewController.swift
//  AppUseMap
//
//  Created by Pedro Pancho on 9/28/16.
//
//

import UIKit
import CoreLocation
import MapKit


class ViewController: UIViewController {

    var cl:CLLocationManager?
    
    @IBOutlet weak var mapView: MKMapView!
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        cl =  CLLocationManager()
        
        cl?.requestWhenInUseAuthorization()
        
        
        // Do any additional setup after loading the view, typically from a nib.
        mapView.showsUserLocation = true
        mapView.userTrackingMode = MKUserTrackingMode.follow
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }


}

