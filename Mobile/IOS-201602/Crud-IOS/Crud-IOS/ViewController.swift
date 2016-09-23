//
//  ViewController.swift
//  Crud-IOS
//
//  Created by Pedro Pancho on 9/6/16.
//  Copyright © 2016 CRUD. All rights reserved.
//

import UIKit

class ViewController: UIViewController,UITableViewDelegate {
    
    @IBOutlet weak var itemTexField: UITextField!
    @IBOutlet weak var tableview: UITableView!
    
    let todoList = TodoList();
    
    @IBAction func addButtonPressed(_ sender: UIButton){
        print("Agregando un elemento a la lista:\(itemTexField.text)")
        
        todoList.addItem(itemTexField.text!)
        tableview.reloadData()
        
        
        self.itemTexField?.resignFirstResponder()
    }
    
    
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view, typically from a nib.
        tableview.register(UITableViewCell.self, forCellReuseIdentifier: "Cell")
        tableview.dataSource = todoList
        tableview.delegate = self
        
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }

    func scrollViewDidScroll(_ scrollView: UIScrollView){
        
        self.itemTexField?.resignFirstResponder()
        
    }
}

