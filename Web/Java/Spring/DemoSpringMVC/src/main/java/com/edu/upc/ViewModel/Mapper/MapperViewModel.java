package com.edu.upc.ViewModel.Mapper;

import org.modelmapper.ModelMapper;

public class MapperViewModel {

	private static ModelMapper mapper;
	
    public static ModelMapper getInstance(){  	
    	if(mapper==null){
    		mapper = new ModelMapper();		
    		configuration();
    	}
    	return mapper;	
    	
    }
    
    private static void configuration(){
    	mapper.addMappings(new AlumnoViewModelMapper());  
    	
    }
}
