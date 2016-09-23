//
//  ViewController.swift
//  Crud-IOS
//
//  Created by Pedro Pancho on 9/6/16.
//  Copyright © 2016 CRUD. All rights reserved.
//

import UIKit

class ViewController: UIViewController {
    
    @IBOutlet weak var itemTexField: UITextField!
    @IBOutlet weak var tableview: UITableView!
    
    let todoList = TodoList();
    
    @IBAction func addButtonPressed(sender: UIButton){
            print("Agregando un elemento a la lista:\(itemTexField.text)")
        
            todoList.addItem(itemTexField.text!)
        tableview.reloadData()
    }
    
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view, typically from a nib.
        tableview.registerClass(UITableViewCell.self, forCellReuseIdentifier: "Cell")
        tableview.dataSource = todoList
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }


}

