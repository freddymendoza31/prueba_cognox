<div>
    <h2>Transacciones Bancarias</h2>

    <div id="transaccionesModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="transaccion">
                    @csrf
					
					<div class="modal-header">						
						<h4 class="modal-title">Transacciones Bancarias</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Código/Referencia</label>
							<select multiple class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
						</div>
						<div class="form-group">
							<label>Peso</label>
							<input type="number" name="peso_kg"  class="form-control " id="peso_kg" placeholder="KG" required>
							
						</div>
						<div class="form-group">
							<label>Producto</label>
							<input type="text" name="name_prod" id="name_prod" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Categoría</label>
							<input type="text" name="category_prod" id="category_prod" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Stock</label>
							<input type="number" name="stock_prod" id="stock_prod" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Precio</label>
							<input type="number" name="price_prod" id="price_prod" class="form-control" required>
						</div>	
                        <div class="form-group">
							<label>Precio</label>
							<input type="file" name="file-photo" id="file-photo" class="form-control" >
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>