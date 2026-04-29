variable "aws_region" {
  default = "eu-west-1"
}

variable "instance_type" {
  default = "t3.micro"
}

variable "key_name" {
  description = "Nombre del key pair para acceder por SSH"
}
