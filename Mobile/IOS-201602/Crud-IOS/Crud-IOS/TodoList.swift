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
    
    
    fileprivate let fileURL: URL = {
        
        let fileManager = FileManager.default
        
        let documentDerectoryURLs = fileManager.urls(for: .documentDirectory, in: .userDomainMask) as [URL]
        
        let documentDirectoryURL = documentDerectoryURLs.first!
        
        print("path de documents\(documentDirectoryURL)")
        
        return documentDirectoryURL.appendingPathComponent("todolist.items")
    }()
    
    func addItem(_ item: String){
        items.append(item)
        saveItems()
    }
    
    func saveItems(){
        let itemsArray = items as NSArray
        
        if itemsArray.write(to: self.fileURL, atomically:true){
                print("guardado")
        } else {
            print("no guardado")
        }
        
    }
    
    func loadItems(){
        if let itemsArray = NSArray(contentsOf: self.fileURL) as?[String]{
            self.items = itemsArray
        }
    }
}

extension TodoList : UITableViewDataSource {
    
    func tableView(_ tableView: UITableView, cellForRowAt indexPath: IndexPath) -> UITableViewCell {
        let cell = tableView.dequeueReusableCell(withIdentifier: "Cell", for: indexPath)
        let item = items[(indexPath as NSIndexPath).row]
        
        let prueba = UIFont(name: "Avenir", size: 22)
        
        cell.textLabel?.font = prueba
        
        cell.textLabel!.text = item
        
        return cell
    }
    
    func tableView(_ tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return items.count
    }
    
    func tableView(_ tableView: UITableView, canEditRowAt indexPath:IndexPath)-> Bool{
        return true;
    }
    
    // Eliminar un objeto de la tabla
    @objc(tableView:commitEditingStyle:forRowAtIndexPath:) func tableView(_ tableView: UITableView, commit editingStyle: UITableViewCellEditingStyle, forRowAt indexPath :IndexPath){
        
        // eliminar items de archivo 
        items.remove(at: indexPath.row)
        saveItems()
        
        // Animacion para eliminar de pantalla
        
        tableView.beginUpdates()
        tableView.deleteRows(at: [indexPath],with: UITableViewRowAnimation.middle)
        tableView.endUpdates()
        
    }
    
    
}

