//
//  TodoList.swift
//  Crud-IOS
//
//  Created by Pedro Pancho on 9/8/16.
//  Copyright © 2016 CRUD. All rights reserved.
//

import Foundation
import UIKit

class TodoList: NSObject{
    
    var items: [String] = []
    
    override init(){
        super.init()
        loadItems()
    }
    
    
    private let fileURL: NSURL = {
        
        let fileManager = NSFileManager.defaultManager()
        
        let documentDerectoryURLs = fileManager.URLsForDirectory(.DocumentDirectory, inDomains: .UserDomainMask) as [NSURL]
        
        let documentDirectoryURL = documentDerectoryURLs.first!
        
        print("path de documents\(documentDirectoryURL)")
        
        return documentDirectoryURL.URLByAppendingPathComponent("todolist.items")
    }()
    
    func addItem(item: String){
        items.append(item)
        saveItems()
    }
    
    func saveItems(){
        let itemsArray = items as NSArray
        
        if itemsArray.writeToURL(self.fileURL, atomically:true){
                print("guardado")
        } else {
            print("no guardado")
        }
        
    }
    
    func loadItems(){
        if let itemsArray = NSArray(contentsOfURL: self.fileURL) as?[String]{
            self.items = itemsArray
        }
    }
}

extension TodoList : UITableViewDataSource {
    
    func tableView(tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return items.count
    }
    
    func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        let cell = tableView.dequeueReusableCellWithIdentifier("Cell", forIndexPath: indexPath)
        let item = items[indexPath.row]
        
        cell.textLabel!.text = item
        
        return cell
    }
}

