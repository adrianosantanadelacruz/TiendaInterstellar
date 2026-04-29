resource "aws_instance" "web" {
  ami = "ami-06baa42b2e92978d7"
  instance_type   = var.instance_type
  subnet_id       = aws_subnet.public.id
  key_name        = var.key_name
  
  # Cambio de security_groups a vpc_security_group_ids
  vpc_security_group_ids = [aws_security_group.web_sg.id]

  user_data = file("${path.module}/user_data.sh")

  tags = {
    Name = "TiendaInterstellar"
  }
}