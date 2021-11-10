import {Entity, model, property} from '@loopback/repository';

@model()
export class Producto extends Entity {
  @property({
    type: 'string',
    id: true,
    generated: true,
  })
  id_Producto?: string;

  @property({
    type: 'string',
    required: true,
  })
  nombre_Producto: string;

  @property({
    type: 'number',
    required: true,
  })
  precio_Producto: number;

  @property({
    type: 'string',
    required: true,
  })
  imagen_Producto: string;

  @property({
    type: 'string',
  })
  facturaId?: string;

  constructor(data?: Partial<Producto>) {
    super(data);
  }
}

export interface ProductoRelations {
  // describe navigational properties here
}

export type ProductoWithRelations = Producto & ProductoRelations;
