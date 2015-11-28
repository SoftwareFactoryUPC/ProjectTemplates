package com.edu.upc.Model.Validators;
import java.util.regex.Matcher;
import java.util.regex.Pattern;
import org.springframework.stereotype.Component;
import org.springframework.validation.Errors;
import org.springframework.validation.ValidationUtils;
import org.springframework.validation.Validator;

import com.edu.upc.Model.Curso;

@Component
public class CursoValidator implements Validator{

	public boolean supports(Class<?> arg0) {
		// TODO Auto-generated method stub
		return false;
	}

	public void validate(Object model, Errors errors) {
		// TODO Auto-generated method stub
		 
		Curso curso = (Curso)model;

		ValidationUtils.rejectIfEmptyOrWhitespace(errors, "nombre", "NotNull.curso.nombre");
		ValidationUtils.rejectIfEmptyOrWhitespace(errors, "codigo", "NotNull.curso.codigo");
		
		Pattern pattern = Pattern.compile("[a-zA-Z]{2}[0-9]{3}");
		Matcher matcher;
		matcher = pattern.matcher(curso.getCodigo());

		if(!matcher.matches()){	
			errors.rejectValue("codigo", "Pattern.curso.codigo");
		}
		
		
		
		
	}

}
