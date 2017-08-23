def truebooj(number):
    # do code here
    if number%3 == 0:
        return "True"
    elif number%10 == 0:
        return "TrueBooj"
    elif number%5 == 0:
        return "Booj"
    else:
        return str(number)
